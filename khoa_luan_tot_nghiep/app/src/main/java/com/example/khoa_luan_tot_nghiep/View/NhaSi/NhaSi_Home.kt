package com.example.khoa_luan_tot_nghiep.View.NhaSi

import android.os.AsyncTask
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.util.Log
import androidx.recyclerview.widget.LinearLayoutManager
import com.example.khoa_luan_tot_nghiep.Adapter.NhaSi.NhaSi_Adapter
import com.example.khoa_luan_tot_nghiep.Adapter.NhaSi.NhaSi_Home_Adapter
import com.example.khoa_luan_tot_nghiep.Entity.NhaSi.NhaSi
import com.example.khoa_luan_tot_nghiep.Entity.NhaSi.NhaSi_Home
import com.example.khoa_luan_tot_nghiep.R
import kotlinx.android.synthetic.main.activity_nha_si__home.*
import kotlinx.android.synthetic.main.activity_show__nha__si.*
import org.json.JSONArray
import org.json.JSONObject
import java.io.BufferedReader
import java.io.InputStreamReader
import java.net.HttpURLConnection
import java.net.URL

class NhaSi_Home : AppCompatActivity() {
    val nhasis = ArrayList<NhaSi_Home>()
    lateinit var adapter : NhaSi_Home_Adapter
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_nha_si__home)
        clearListVideo()
        var url = "https://apptm.000webhostapp.com/khoa_luan/API/Branch_NhaSi/api_show_nha_si.php"
        Getdata().execute(url)
        initAdapter()
        initRecyclerView()

    }
    private fun initRecyclerView() {
        rv_nhasi_home.layoutManager = LinearLayoutManager(this)
        rv_nhasi_home.setHasFixedSize(true)
        rv_nhasi_home.adapter = adapter
    }

    private fun initAdapter() {
        adapter = NhaSi_Home_Adapter(nhasis)
    }
    fun clearListVideo(){
        nhasis.clear()
    }

    inner class Getdata : AsyncTask<String, Void, String>() {

        override fun doInBackground(vararg p0: String?): String {
            return getContentURL(p0[0])
        }

        override fun onPostExecute(result: String?) {
            super.onPostExecute(result)
            var ten_nhasi : String? = ""
            var mota_nhasi : String? =""
            var gioi_tinh : String? = ""
            var sdt : String? = ""
            var trinh_do : String? = ""
            var hinh_anh : String? = ""
            var lich : String? =""
            var jsonArray: JSONArray = JSONArray(result)
            for (vd in 0..jsonArray.length() - 1) {
                var objectVD: JSONObject = jsonArray.getJSONObject(vd)
                ten_nhasi = objectVD.getString("ho_ten_nha_si")
                mota_nhasi = objectVD.getString("gioi_thieu_nha_si")
                trinh_do = objectVD.getString("trinh_do_nha_si")
                sdt = objectVD.getString("so_dien_thoai_nha_si")
                gioi_tinh  = objectVD.getString("gioi_tinh_nha_si")
                hinh_anh = objectVD.getString("hinh_anh_nha_si")
                lich = objectVD.getString("lich_lam_viec_nha_si")
                nhasis.add(com.example.khoa_luan_tot_nghiep.Entity.NhaSi.NhaSi_Home(ten_nhasi,sdt,gioi_tinh,mota_nhasi,trinh_do,lich,hinh_anh))


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