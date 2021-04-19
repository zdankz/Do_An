package com.example.khoa_luan_tot_nghiep.View.Toge

import android.os.AsyncTask
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.util.Log
import com.example.khoa_luan_tot_nghiep.Entity.Toge.ngay_lam_viec
import com.example.khoa_luan_tot_nghiep.R
import kotlinx.android.synthetic.main.activity_detail__nha_si.*
import kotlinx.android.synthetic.main.activity_register.*
import org.json.JSONArray
import org.json.JSONObject
import java.io.BufferedReader
import java.io.InputStreamReader
import java.net.HttpURLConnection
import java.net.URL

class Register : AppCompatActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_register)
        val i = intent
        ten_nha_si_register.text = i.getStringExtra("ten")
        vandegapphai.text = i.getStringExtra("tendv")
        chiphi_uoctinh.text = "${i.getStringExtra("chiphi")} VND"
        ngaydk.text = i.getStringExtra("ngay")
        ngaybd.text = i.getStringExtra("bd")
        ngaykt.text = i.getStringExtra("kt")
        val hoten = input_hoten.text.toString()
        val sdt = input_sodienthoai.text.toString()
        val url = "http://192.168.1.81:80/khoa_luan/API/fun_process/register.php?hovaten=${hoten}&sodienthoai=${sdt}&id_nha_si=${i.getStringExtra("id_ns")}" +
                "&id_dich_vu=${i.getStringExtra("id_dv")}&thoi_gian_dang_ky=${i.getStringExtra("ngay")} ${i.getStringExtra("bd")}" +
                "&thoi_gian_du_tru_ket_thuc=${i.getStringExtra("ngay")} ${i.getStringExtra("kt")}&chi_phi_uoc_tinh=${i.getStringExtra("chiphi")}"
        bkkk.setOnClickListener {
            load_url.text = url.toString()
            Getdata().execute(url)
        }

    }
    inner class Getdata : AsyncTask<String, Void, String>() {

        override fun doInBackground(vararg p0: String?): String {
            return getContentURL(p0[0])
        }

        override fun onPostExecute(result: String?) {
            super.onPostExecute(result)
            var day : String ? =""

//            var cal = Calendar.getInstance()
//            var ngayhn = cal.get(Calendar.DATE).toInt()
            var jsonArray: JSONArray = JSONArray(result)
            for (vd in 0..jsonArray.length() - 1) {
                var objectVD: JSONObject = jsonArray.getJSONObject(vd)
                day = objectVD.getString("trangthai")





            }

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