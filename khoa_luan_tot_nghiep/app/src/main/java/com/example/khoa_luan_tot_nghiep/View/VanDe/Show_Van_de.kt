package com.example.khoa_luan_tot_nghiep.View.VanDe

import android.os.AsyncTask
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.util.Log
import androidx.recyclerview.widget.LinearLayoutManager
import com.example.khoa_luan_tot_nghiep.Adapter.VanDe.VanDe_Adapter
import com.example.khoa_luan_tot_nghiep.Entity.VanDe.VanDe
import com.example.khoa_luan_tot_nghiep.R
import kotlinx.android.synthetic.main.activity_show__van_de.*
import org.json.JSONArray
import org.json.JSONObject
import java.io.BufferedReader
import java.io.InputStreamReader
import java.net.HttpURLConnection
import java.net.URL

class Show_Van_de : AppCompatActivity() {
    val vandes = ArrayList<VanDe>()
    lateinit var adapter : VanDe_Adapter
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_show__van_de)
        input_vande_vande.setOnCheckedChangeListener { group, checkedId ->
            if(checkedId == R.id.benhly_vande){
                var URL_GET : String = "http://apptm.000webhostapp.com/khoa_luan/API/Branch_VanDe/api_show_vande_nhomvd.php?key_nhom_dich_vu=2"
                clearListVideo()
                Getdata().execute(URL_GET)
                initAdapter()
                initRecyclerView()

            } else if(checkedId == R.id.thammy_vande){
                var URL_GET : String = "http://apptm.000webhostapp.com/khoa_luan/API/Branch_VanDe/api_show_vande_nhomvd.php?key_nhom_dich_vu=1"
                clearListVideo()
                Getdata().execute(URL_GET)
                initAdapter()
                initRecyclerView()

            }
        }
    }
    private fun initRecyclerView() {
        rvAmUser_VanDe.layoutManager = LinearLayoutManager(this)
        rvAmUser_VanDe.setHasFixedSize(true)
        rvAmUser_VanDe.adapter = adapter
    }

    private fun initAdapter() {
        adapter = VanDe_Adapter(vandes)
    }
    fun clearListVideo(){
        vandes.clear()
    }

    inner class Getdata : AsyncTask<String, Void, String>() {

        override fun doInBackground(vararg p0: String?): String {
            return getContentURL(p0[0])
        }

        override fun onPostExecute(result: String?) {
            super.onPostExecute(result)

            var idvd : String? = ""
            var tenvd : String? = ""
            var mota : String? =""
            var hinhanhvd : String? = ""
            var chiphivd : String? = ""
            var idnhom : String? = ""
            var time : String? =""

            var jsonArray: JSONArray = JSONArray(result)
            for (vd in 0..jsonArray.length() - 1) {
                var objectVD: JSONObject = jsonArray.getJSONObject(vd)

                idvd = objectVD.getString("id_dich_vu")
                tenvd = objectVD.getString("ten_dich_vu")
                mota = objectVD.getString("mota_dich_vu")
                hinhanhvd = objectVD.getString("hinh_anh_dich_vu")
                chiphivd = objectVD.getString("chiphi_dich_vu")
                idnhom  = objectVD.getString("id_nhom_dich_vu")
                time = objectVD.getString("thoi_gian_uoc_tinh")
                vandes.add(VanDe(idvd,idnhom,tenvd,mota,hinhanhvd,chiphivd,time))

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