package com.example.khoa_luan_tot_nghiep.View.NhaSi

import android.os.AsyncTask
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.util.Log
import androidx.recyclerview.widget.LinearLayoutManager
import com.example.khoa_luan_tot_nghiep.Adapter.NhaSi.NhaSi_VanDe_Adapter
import com.example.khoa_luan_tot_nghiep.Entity.NhaSi.NhaSi_Vande
import com.example.khoa_luan_tot_nghiep.R
import kotlinx.android.synthetic.main.activity_show__nha_si__van_de.*
import org.json.JSONArray
import org.json.JSONObject
import java.io.BufferedReader
import java.io.InputStreamReader
import java.net.HttpURLConnection
import java.net.URL

class Show_NhaSi_VanDe : AppCompatActivity() {
    val nhasi_vandes = ArrayList<NhaSi_Vande>()
    lateinit var adapter : NhaSi_VanDe_Adapter
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_show__nha_si__van_de)
        var i = intent
        var id_ns: String? = i.getStringExtra("nhasi")
        var id_nhom : String? = i.getStringExtra("nhom")
        var url :String = "http://192.168.1.81:80/khoa_luan/API/Branch_NhaSi/api_show_dich_vu_theo_nhasi.php?id_nha_si=${id_ns}&id_nhom_van_de=${id_nhom}"
        clearListVideo()
        Getdata().execute(url)
        initAdapter()
        initRecyclerView()
    }
    private fun initRecyclerView() {
        rvAmUser_Nha_Si_Vande.layoutManager = LinearLayoutManager(this)
        rvAmUser_Nha_Si_Vande.setHasFixedSize(true)
        rvAmUser_Nha_Si_Vande.adapter = adapter
    }

    private fun initAdapter() {
        adapter = NhaSi_VanDe_Adapter(nhasi_vandes)
    }
    fun clearListVideo(){
        nhasi_vandes.clear()
    }

    inner class Getdata : AsyncTask<String, Void, String>() {

        override fun doInBackground(vararg p0: String?): String {
            return getContentURL(p0[0])
        }

        override fun onPostExecute(result: String?) {
            super.onPostExecute(result)
            var id_dichvu : String? = ""
            var ten_dichvu : String? = ""
            var mota_dichvu : String? =""
            var hinhanhh : String? = ""
            var chiphi : String? = ""
            var time: String? =""
            var idns : String? = ""
            var ten : String? = ""

            var jsonArray: JSONArray = JSONArray(result)
            for (vd in 0..jsonArray.length() - 1) {
                var objectVD: JSONObject = jsonArray.getJSONObject(vd)

                id_dichvu = objectVD.getString("id_dich_vu")
                ten_dichvu = objectVD.getString("ten_dich_vu")
                mota_dichvu = objectVD.getString("mota_dich_vu")
                hinhanhh = objectVD.getString("hinh_anh_dich_vu")
                chiphi = objectVD.getString("chiphi_dich_vu")
                time = objectVD.getString("thoi_gian_uoc_tinh")
                idns = objectVD.getString("id_nha_si")
                ten = objectVD.getString("ho_ten_nha_si")
                nhasi_vandes.add(NhaSi_Vande(id_dichvu,ten_dichvu,mota_dichvu,hinhanhh,chiphi,time,idns,ten))
    //            vandes.add(_new_Vande(id_dichvu, ten_dichvu, mota_dichvu, hinhanhh, chiphi))
                //nhasis.add(Nhasi(id_nhasi,ten_nhasi,gioi_tinh,sdt,trinh_do,mota_nhasi,id_nhom))

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