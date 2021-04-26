package com.example.khoa_luan_tot_nghiep.View.Toge

import android.os.AsyncTask
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.util.Log
import androidx.recyclerview.widget.LinearLayoutManager
import com.example.khoa_luan_tot_nghiep.Adapter.Toge.ngay_lam_viec_adapter
import com.example.khoa_luan_tot_nghiep.Adapter.Toge.time_adapter
import com.example.khoa_luan_tot_nghiep.Entity.Toge.ngay_lam_viec
import com.example.khoa_luan_tot_nghiep.Entity.Toge.time
import com.example.khoa_luan_tot_nghiep.R
import kotlinx.android.synthetic.main.activity_time__v_d.*
import org.json.JSONArray
import org.json.JSONObject
import java.io.BufferedReader
import java.io.InputStreamReader
import java.net.HttpURLConnection
import java.net.URL

class time_VD : AppCompatActivity() {
    val time = ArrayList<time>()
    lateinit var adapter : time_adapter
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_time__v_d)
        var i = intent

        clearListVideo()
            val url = "http://192.168.1.81:80/khoa_luan/API/fun_process/lich_de_cu.php?dichvu=${i.getStringExtra("dichvu")}&id_nha_si=${i.getStringExtra("idns")}&ngay='${i.getStringExtra("ngay")}'"
            Getdata().execute(url)
            initAdapter()
            initRecyclerView()
    }
        private fun initRecyclerView() {
        rvAmUser_time.layoutManager = LinearLayoutManager(this, LinearLayoutManager.VERTICAL,false)
            rvAmUser_time.setHasFixedSize(true)
            rvAmUser_time.adapter = adapter
    }

    private fun initAdapter() {
        adapter = time_adapter(time)
    }
    fun clearListVideo(){
        time.clear()
    }

    inner class Getdata : AsyncTask<String, Void, String>() {

        override fun doInBackground(vararg p0: String?): String {
            return getContentURL(p0[0])
        }

        override fun onPostExecute(result: String?) {
            super.onPostExecute(result)

            var idns : String? = ""
            var hoten : String? = ""
            var iddv : String? = ""
            var tendv : String ? =""
            var chiphi : String? = ""
            var ngay : String? = ""
            var batdau : String?=""
            var kt : String? = ""
            var jsonArray: JSONArray = JSONArray(result)
            for (vd in 0..jsonArray.length() - 1) {
                var objectVD: JSONObject = jsonArray.getJSONObject(vd)

                idns = objectVD.getString("id_nha_si")
                hoten = objectVD.getString("ho_ten_nha_si")
                iddv = objectVD.getString("id_dich_vu")
                tendv = objectVD.getString("ten_dich_vu")
                chiphi = objectVD.getString("chiphi_dich_vu")
                ngay = objectVD.getString("ngay")
                kt = objectVD.getString("ketthuc")
                batdau = objectVD.getString("batdau")

                time.add(time(idns,hoten,iddv,tendv,chiphi,ngay,batdau,kt))

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