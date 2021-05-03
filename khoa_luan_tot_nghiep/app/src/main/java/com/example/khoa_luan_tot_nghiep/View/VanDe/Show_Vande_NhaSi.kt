package com.example.khoa_luan_tot_nghiep.View.VanDe

import android.content.Intent
import android.os.AsyncTask
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.util.Log
import androidx.recyclerview.widget.LinearLayoutManager
import com.example.khoa_luan_tot_nghiep.Adapter.NhaSi.NhaSi_VanDe_Adapter
import com.example.khoa_luan_tot_nghiep.Adapter.VanDe.Vande_NhaSi_Adapter
import com.example.khoa_luan_tot_nghiep.Entity.NhaSi.NhaSi_Vande
import com.example.khoa_luan_tot_nghiep.Entity.VanDe.Vande_NhaSi
import com.example.khoa_luan_tot_nghiep.R
import kotlinx.android.synthetic.main.activity_show__nha_si__van_de.*
import kotlinx.android.synthetic.main.activity_show__vande__nha_si.*
import org.json.JSONArray
import org.json.JSONObject
import java.io.BufferedReader
import java.io.InputStreamReader
import java.net.HttpURLConnection
import java.net.URL

class Show_Vande_NhaSi : AppCompatActivity() {
    val vande_nhasis = ArrayList<Vande_NhaSi>()
    lateinit var adapter : Vande_NhaSi_Adapter
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_show__vande__nha_si)
//        val inttent = Intent()
//        val id = inttent.getStringExtra("vande")
        var i = intent
        var id = i.getStringExtra("vande")
        et.setText(id.toString())
        var url :String = "http://apptm.000webhostapp.com/khoa_luan/API/Branch_VanDe/show_nhasi_theo_vande.php?id_dich_vu=${id}"
        clearListVideo()
        Getdata().execute(url)
        initAdapter()
        initRecyclerView()


    }
    private fun initRecyclerView() {
        rvAmUser_Vande_NhaSi.layoutManager = LinearLayoutManager(this)
        rvAmUser_Vande_NhaSi.setHasFixedSize(true)
        rvAmUser_Vande_NhaSi.adapter = adapter
    }

    private fun initAdapter() {
        adapter = Vande_NhaSi_Adapter(vande_nhasis)
    }
    fun clearListVideo(){
        vande_nhasis.clear()
    }

    inner class Getdata : AsyncTask<String, Void, String>() {

        override fun doInBackground(vararg p0: String?): String {
            return getContentURL(p0[0])
        }

        override fun onPostExecute(result: String?) {
            super.onPostExecute(result)
            var id_ns : String? = ""
            var hoten : String? = ""
            var gioitinh : String? =""
            var sdt : String? = ""
            var trinh : String? = ""
            var gt : String? = ""
            var hinh : String? = ""
            var lichl : String? =""
            var id_dv : String? =""

            var jsonArray: JSONArray = JSONArray(result)
            for (vd in 0..jsonArray.length() - 1) {
                var objectVD: JSONObject = jsonArray.getJSONObject(vd)
                id_ns = objectVD.getString("id_nha_si")
                hoten = objectVD.getString("ho_ten_nha_si")
                gioitinh = objectVD.getString("gioi_tinh_nha_si")
                sdt = objectVD.getString("so_dien_thoai_nha_si")
                trinh = objectVD.getString("trinh_do_nha_si")
                gt = objectVD.getString("gioi_thieu_nha_si")
                hinh = objectVD.getString("hinh_anh_nha_si")
                lichl = objectVD.getString("lich_lam_viec_nha_si")
                id_dv = objectVD.getString("id_dich_vu")
                vande_nhasis.add(Vande_NhaSi(id_ns,hoten,gioitinh,sdt,trinh,gt,hinh,lichl,id_dv))

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