package com.example.khoa_luan_tot_nghiep.View.NhaSi

import android.os.AsyncTask
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.util.Log
import androidx.recyclerview.widget.LinearLayoutManager
import com.example.khoa_luan_tot_nghiep.Adapter.NhaSi.NhaSi_Adapter
import com.example.khoa_luan_tot_nghiep.Entity.NhaSi.NhaSi
import com.example.khoa_luan_tot_nghiep.R
import kotlinx.android.synthetic.main.activity_show__nha__si.*
import org.json.JSONArray
import org.json.JSONObject
import java.io.BufferedReader
import java.io.InputStreamReader
import java.net.HttpURLConnection
import java.net.URL

class Show_Nha_Si : AppCompatActivity() {
    val nhasis = ArrayList<NhaSi>()
    lateinit var adapter : NhaSi_Adapter
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_show__nha__si)
        input_vande.setOnCheckedChangeListener { group, checkedId ->
            if(checkedId == R.id.benhly_nhasi){
                clearListVideo()
                var url = "http://apptm.000webhostapp.com/khoa_luan/API/Branch_NhaSi/api_show_nhasi_nhomdv.php?key_nhom_dich_vu=2"
                Getdata().execute(url)
                initAdapter()
                initRecyclerView()
            }else if (checkedId == R.id.thammy_nhasi){
                clearListVideo()
                var url = "http://apptm.000webhostapp.com/khoa_luan/API/Branch_NhaSi/api_show_nhasi_nhomdv.php?key_nhom_dich_vu=1"
                Getdata().execute(url)
                initAdapter()
                initRecyclerView()

            }
        }
    }
    private fun initRecyclerView() {
        rvAmUser_Nha_Si.layoutManager = LinearLayoutManager(this)
        rvAmUser_Nha_Si.setHasFixedSize(true)
        rvAmUser_Nha_Si.adapter = adapter
    }

    private fun initAdapter() {
        adapter = NhaSi_Adapter(nhasis)
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

            var id_nhasi : String? = ""
            var ten_nhasi : String? = ""
            var mota_nhasi : String? =""
            var gioi_tinh : String? = ""
            var sdt : String? = ""
            var trinh_do : String? = ""
            var id_nhom: String? =""
            var hinh_anh : String? = ""
            var lich : String? =""
            var jsonArray: JSONArray = JSONArray(result)
            for (vd in 0..jsonArray.length() - 1) {
                var objectVD: JSONObject = jsonArray.getJSONObject(vd)
                id_nhasi = objectVD.getString("id_nha_si")
                ten_nhasi = objectVD.getString("ho_ten_nha_si")
                mota_nhasi = objectVD.getString("gioi_thieu_nha_si")
                trinh_do = objectVD.getString("trinh_do_nha_si")
                sdt = objectVD.getString("so_dien_thoai_nha_si")
                gioi_tinh  = objectVD.getString("gioi_tinh_nha_si")
                hinh_anh = objectVD.getString("hinh_anh_nha_si")
                lich = objectVD.getString("lich_lam_viec_nha_si")
                id_nhom = objectVD.getString("id_nhom_dich_vu")
                nhasis.add(NhaSi(id_nhasi, ten_nhasi, gioi_tinh, sdt, trinh_do, mota_nhasi,hinh_anh,lich, id_nhom))

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