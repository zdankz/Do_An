package com.example.khoa_luan_tot_nghiep.View.Toge

import android.os.AsyncTask
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.util.Log
import android.widget.Toast
import androidx.recyclerview.widget.LinearLayoutManager
import com.example.khoa_luan_tot_nghiep.Adapter.Toge.ngay_lam_viec_adapter
import com.example.khoa_luan_tot_nghiep.Entity.Toge.ngay_lam_viec
import com.example.khoa_luan_tot_nghiep.Entity.VanDe.VanDe
import com.example.khoa_luan_tot_nghiep.R
import kotlinx.android.synthetic.main.activity_show__van_de.*
import kotlinx.android.synthetic.main.activity_show_lich.*
import org.json.JSONArray
import org.json.JSONObject
import java.io.BufferedReader
import java.io.InputStreamReader
import java.net.HttpURLConnection
import java.net.URL
import java.util.*
import kotlin.collections.ArrayList

class show_lich : AppCompatActivity() {
    val ngay_lam_viec = ArrayList<ngay_lam_viec>()
    lateinit var adapter : ngay_lam_viec_adapter
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_show_lich)
        clearListVideo()
        val i = intent
        val id_ns = i.getStringExtra("id_ns")
        val id_dv : String? = i.getStringExtra("id_dv")
        button_tim_kiem_lich_phuhop.setOnClickListener {
            if(input_nam.text.toString() == "" || input_thang.text.toString() == "")
            {
                Toast.makeText(this,"Nhap vo",Toast.LENGTH_SHORT).show()
            }
            else {
                var cal1 = Calendar.getInstance()
                var ngayhn1 = cal1.get(Calendar.DATE).toInt()
                var thang1 = cal1.get(Calendar.MONTH).toInt()
                var nam1 = cal1.get(Calendar.YEAR).toInt()
                clearListVideo()
                var nam = input_nam.text.toString()
                var thang = input_thang.text.toString()
                if(nam.toInt() < nam1 || (nam.toInt() - nam1) >=2 ){
                            Toast.makeText(this,"nhap lai",Toast.LENGTH_SHORT).show()
                }else if(nam.toInt() == nam1 && thang.toInt() < thang1){

                        Toast.makeText(this, "Xem lai thang", Toast.LENGTH_SHORT).show()

                }else if(thang.toInt() > 12 || thang.toInt() < 0){
                    Toast.makeText(this,"Xem lai thang",Toast.LENGTH_SHORT).show()
                }else {
                    Toast.makeText(this,"OK",Toast.LENGTH_SHORT).show()
                    val url : String = "http://192.168.1.81:80/khoa_luan/API/fun_process/api_show_ngay_lam_viec.php?month=${thang}&year=${nam}&id_nhasi=${id_ns}&dichvu=${id_dv}"
                    Getdata().execute(url)
                    initAdapter()
                    initRecyclerView()
                }


            }

        }
    }
    private fun initRecyclerView() {
        rlRoot_khung_gio.layoutManager = LinearLayoutManager(this,LinearLayoutManager.HORIZONTAL,false)
        rlRoot_khung_gio.setHasFixedSize(true)
        rlRoot_khung_gio.adapter = adapter
    }

    private fun initAdapter() {
        adapter = ngay_lam_viec_adapter(ngay_lam_viec)
    }
    fun clearListVideo(){
        ngay_lam_viec.clear()
    }

    inner class Getdata : AsyncTask<String, Void, String>() {

        override fun doInBackground(vararg p0: String?): String {
            return getContentURL(p0[0])
        }

        override fun onPostExecute(result: String?) {
            super.onPostExecute(result)
            var day : String ? =""
            var thang : String ? =""

            var ngay : String? = ""
            var thu : String? = ""
            var idns : String? = ""
            var iddv : String? = ""
            var nam : String? =""
            var cal = Calendar.getInstance()
            var ngayhn = cal.get(Calendar.DATE).toInt()
            var jsonArray: JSONArray = JSONArray(result)
            for (vd in 0..jsonArray.length() - 1) {
                var objectVD: JSONObject = jsonArray.getJSONObject(vd)
                day = objectVD.getString("day")
                thang = objectVD.getString("month")
                ngay = objectVD.getString("ngay")
                thu = objectVD.getString("thu")
                idns = objectVD.getString("id_nha_si")
                iddv = objectVD.getString("id_dich_vu")
                nam = objectVD.getString("nam")

                    ngay_lam_viec.add(ngay_lam_viec(day,thang,ngay,thu,idns,iddv,nam))


            }
            adapter.notifyDataSetChanged()
        }
    }
    private fun getContentURL(url: String?) : String{
        var content: StringBuilder = StringBuilder();
        val url: URL = URL(url)
        val urlConnection: HttpURLConnection = url.openConnection() as HttpURLConnection
        val inputStreamReader = InputStreamReader(urlConnection.inputStream)
        val bufferedReader: BufferedReader = BufferedReader(inputStreamReader)

        var line: String = ""
        try {
            do {
                line = bufferedReader.readLine()
                if(line != null){
                    content.append(line)
                }
            }while (line != null)
            bufferedReader.close()
        }catch (e: Exception){
            Log.d("Loi la:", e.toString())
        }
        return content.toString()
    }
}