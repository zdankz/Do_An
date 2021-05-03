package com.example.khoa_luan_tot_nghiep.View.VanDe

import android.os.AsyncTask
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.util.Log
import androidx.recyclerview.widget.LinearLayoutManager
import com.example.khoa_luan_tot_nghiep.Adapter.VanDe.VanDe_Adapter
import com.example.khoa_luan_tot_nghiep.Adapter.VanDe.Vande_Home_Adapter
import com.example.khoa_luan_tot_nghiep.Entity.VanDe.VanDe
import com.example.khoa_luan_tot_nghiep.Entity.VanDe.Vande_Home
import com.example.khoa_luan_tot_nghiep.R
import kotlinx.android.synthetic.main.activity_show__van_de.*
import kotlinx.android.synthetic.main.activity_van_de__home.*
import org.json.JSONArray
import org.json.JSONObject
import java.io.BufferedReader
import java.io.InputStreamReader
import java.net.HttpURLConnection
import java.net.URL

class VanDe_Home : AppCompatActivity() {
    val vandes = ArrayList<Vande_Home>()
    lateinit var adapter : Vande_Home_Adapter
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_van_de__home)
        var URL_GET : String = "http://apptm.000webhostapp.com/khoa_luan/API/Branch_VanDe/show_vande.php"
        clearListVideo()
        Getdata().execute(URL_GET)
        initAdapter()
        initRecyclerView()





    }
    private fun initRecyclerView() {
        rv_VanDe_Home.layoutManager = LinearLayoutManager(this)
        rv_VanDe_Home.setHasFixedSize(true)
        rv_VanDe_Home.adapter = adapter
    }

    private fun initAdapter() {
        adapter = Vande_Home_Adapter(vandes)
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

            //var idvd : String? = ""
            var tenvd : String? = ""
            var mota : String? =""
            var hinhanhvd : String? = ""
//            var chiphivd : String? = ""
//            var idnhom : String? = ""
//            var time : String? =""

            var jsonArray: JSONArray = JSONArray(result)
            for (vd in 0..jsonArray.length() - 1) {
                var objectVD: JSONObject = jsonArray.getJSONObject(vd)

               // idvd = objectVD.getString("id_dich_vu")
                tenvd = objectVD.getString("ten_dich_vu")
                mota = objectVD.getString("mota_dich_vu")
                hinhanhvd = objectVD.getString("hinh_anh_dich_vu")
//                chiphivd = objectVD.getString("chiphi_dich_vu")
//                idnhom  = objectVD.getString("id_nhom_dich_vu")
//                time = objectVD.getString("thoi_gian_uoc_tinh")
                vandes.add(Vande_Home(tenvd,mota,hinhanhvd))

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