package com.example.dangkykham.V

import android.content.Intent
import android.os.AsyncTask
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.util.Log
import android.widget.RadioButton
import android.widget.Toast
import androidx.core.view.get
import com.example.dangkykham.R
import kotlinx.android.synthetic.main.activity_detail_vande.*
import kotlinx.android.synthetic.main.activity_register.*
import org.json.JSONArray
import org.json.JSONObject
import java.io.BufferedReader
import java.io.InputStreamReader
import java.net.HttpURLConnection
import java.net.URL
import java.time.Year
import java.util.*

class register : AppCompatActivity() {

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_register)
        val i = intent
        val id_vande : String? = i.getStringExtra("idvande")

        val a : String? = i.getStringExtra("tenbenh")

//        var idd = input_gioitinh.checkedRadioButtonId

       var gioitinhset : String =""
        input_gioitinh.setOnCheckedChangeListener{
            group, checkedId ->
            if (checkedId == R.id.nam ){
                gioitinhset = "Nam"
            }else{
                gioitinhset = "Nữ"
            }

        }

        loadvadetubooking.setText(a)
        var cal = Calendar.getInstance()
        var ngayhn = cal.get(Calendar.DATE).toInt()
        var thanghn = cal.get(Calendar.MONTH).toInt()
        var namhn = cal.get(Calendar.YEAR)
        book_now.setOnClickListener {
            //xet cã input đã có dữ liệu hay chưa

            if(         (edt_hoten.text.toString()).isEmpty() == false
                    && (edt_sdt.text.toString()).isEmpty() == false
                    && (edt_ngaysinh.text.toString()).isEmpty() == false
                    && (edt_thangsinh.text.toString()).isEmpty()== false
                    && (edt_namsinh.text.toString()).isEmpty()== false
                    && (edt_ngay.text.toString()).isEmpty()== false
                    && (edt_thang.text.toString()).isEmpty() == false
                    && (edt_nam.text.toString()).isEmpty()  == false)
            {
//                Toast.makeText(this,"ok",Toast.LENGTH_SHORT).show()
                var  hoten_input = edt_hoten.text.toString() // họ và tên
                var sdt_input = edt_sdt.text.toString().toInt() // số điện thoai

                val ngaysinh_input = edt_ngaysinh.text.toString().toInt() // ngày sinh
                val thansinh_input = edt_thangsinh.text.toString().toInt()// tháng sinh
                val namsinh_input = edt_namsinh.text.toString().toInt()//năm sinh


                val ngaydk = edt_ngay.text.toString().toInt() // ngày đăng ký
                val thangdk = edt_thang.text.toString().toInt() // tháng đăng ký
                val namdk = edt_nam.text.toString().toInt()// năm đk
                val giodk = edt_gio.text.toString().toInt() // giờ đk
                val phutdk = edt_phut.text.toString().toInt() // phut dk
                //Xét điều kiện đầu vào cho ngay tháng năm sinh
                    if(namsinh_input >= namhn  ){
                        Toast.makeText(this,"Năm sinh không hợp lệ",Toast.LENGTH_SHORT).show()
                    }

                    else if( thansinh_input == 2 && ngaysinh_input > 28){
                        Toast.makeText(this,"Tháng 2 không có ngày .${ngaysinh_input}",Toast.LENGTH_SHORT).show()
                    }
                    else if( thansinh_input == 4 && ngaysinh_input > 30){
                        Toast.makeText(this,"Tháng 4 không có ngày .${ngaysinh_input}",Toast.LENGTH_SHORT).show()
                    }
                    else if( thansinh_input == 6 && ngaysinh_input > 30){
                        Toast.makeText(this,"Tháng 6 không có ngày .${ngaysinh_input}",Toast.LENGTH_SHORT).show()
                    }
                    else if( thansinh_input == 9 && ngaysinh_input > 30){
                        Toast.makeText(this,"Tháng 9 không có ngày .${ngaysinh_input}",Toast.LENGTH_SHORT).show()
                    }
                    else if( thansinh_input == 11 && ngaysinh_input > 30){
                        Toast.makeText(this,"Tháng 11 không có ngày .${ngaysinh_input}",Toast.LENGTH_SHORT).show()
                    }
                    else if( thansinh_input == 2 && ngaysinh_input > 28){
                        Toast.makeText(this,"Tháng 2 không có ngày .${ngaysinh_input}",Toast.LENGTH_SHORT).show()
                    }
                    else if(thansinh_input > 12){
                        Toast.makeText(this,"Không có tháng ${thansinh_input}",Toast.LENGTH_SHORT).show()
                    }
                    else if(ngaysinh_input > 31 ) {
                        Toast.makeText(this, "Không có ngày ${ngaysinh_input}", Toast.LENGTH_SHORT).show()
                    }
//                    else if(thansinh_input == 4 ||thansinh_input == 6 || thansinh_input == 9
//                            ||thansinh_input == 11 && ngaysinh_input > 30){
////                        if(ngaysinh_input > 30){
//                            Toast.makeText(this,"Tháng .${thansinh_input} không có ngày .${ngaysinh_input}",Toast.LENGTH_SHORT).show()
//
//                        //}
//                    }
                    // XÉT ĐIỀU KIỆN CHO ĐẦU VÀO NGÀY ĐĂNG KÍ
                    else if(thangdk > 12  ){
                        Toast.makeText(this,"Không có tháng .${thangdk}",Toast.LENGTH_SHORT).show()
                    }
                    else if(namdk < namhn  ){
                        Toast.makeText(this,"Xem lại năm đăng ký khám",Toast.LENGTH_SHORT).show()
                    }
                    else if(thangdk == 2 && ngaydk > 28){
                        Toast.makeText(this,"Tháng 2 không có ngày .${ngaydk}",Toast.LENGTH_SHORT).show()
                    }
                    else if(namdk == namhn && thangdk < thanghn ){
                        Toast.makeText(this,"Đã qua khung giờ hẹn ",Toast.LENGTH_SHORT).show()
                    }
                    else if(namdk == namhn && thangdk == thanghn && ngaydk < ngayhn ){
                        Toast.makeText(this,"Đã qua khung giờ hẹn ",Toast.LENGTH_SHORT).show()
                    }
                    // xét điều kiện cho giờ phút
                    else if(giodk < 8 || giodk > 20 ){
                        Toast.makeText(this,"Nha khoa mở từ 8h đến 20h mỗi ngày ",Toast.LENGTH_SHORT).show()
                    }
                    else if(phutdk > 60){
                        Toast.makeText(this,"Thời gian không hợp lệ",Toast.LENGTH_SHORT).show()
                    }

                    else {

//                        Toast.makeText(this,"ok",Toast.LENGTH_SHORT).show()
                        sendreques(edt_hoten.text.toString().replace(' ','+'),edt_sdt.text.toString(),edt_namsinh.text.toString().toInt(),
                                edt_thangsinh.text.toString().toInt(),edt_ngaysinh.text.toString().toInt(),
                                gioitinhset.toString(),edt_nam.text.toString().toInt(),edt_thang.text.toString().toInt(),
                                edt_ngay.text.toString().toInt(),edt_gio.text.toString().toInt(),edt_phut.text.toString().toInt(),
                                id_vande.toString())
                        var i = Intent(this,TY::class.java)
                        startActivity(i)
                        finish()


                    }
            }
            else
            {
                Toast.makeText(this,"điền đủ thông tin",Toast.LENGTH_SHORT).show()

            }

        }





    }
    private fun nam(){

    }
    private fun sendreques(hovaten:String,sdt:String,namsinh:Int,thangsinh:Int,ngaysinh:Int,
                           gioitinh:String,namdk:Int,thangdk:Int,ngaydk:Int,giodk:Int,phutdk:Int,id_vande: String)
    {
        var url_request: String = "http://192.168.0.105:80/do_an/dash/Process/process_register.php?"
        var chuoi_request: String = "hovaten=${hovaten}&sodienthoai=${sdt}" +
                "&ngaythangnamsinh=${namsinh.toString()}-${thangsinh.toString()}-${ngaysinh.toString()}" +
                "&gioitinh=${gioitinh.toString()}" +
                "&thoigiandangky=${namdk.toString()}-${thangdk.toString()}-${thangdk.toString()}-${giodk.toString()}" +
                ":${phutdk}" +
                "&vande=${id_vande}"
        url_request = "${url_request}${chuoi_request}"
        Toast.makeText(this,"${url_request.toString()}",Toast.LENGTH_SHORT).show()
        Getdata().execute(url_request)

    }

    inner class Getdata : AsyncTask<String, Void, String>() {

        override fun doInBackground(vararg p0: String?): String {
            return getContentURL(p0[0])
        }

        override fun onPostExecute(result: String?) {
            super.onPostExecute(result)
            var idd: String=""
            var namee: String = ""
            var url_s: String = ""
            var jsonArray: JSONArray = JSONArray(result)
            for (video in 0..jsonArray.length() - 1) {
                var objectVD: JSONObject = jsonArray.getJSONObject(video)
                idd= objectVD.getString("stt")
                namee = objectVD.getString("sdt")
                url_s = objectVD.getString("name")
                var gt = objectVD.getString("gioitinh")
                var idvd = objectVD.getString("tenvande")
                var timecre = objectVD.getString("time_cre")
                var time_yc = objectVD.getString("time_yeucau")


//                users.add(User("",idd,namee,url_s))
                //listview.Name.text = name
                //mangbaihat.add(id+"\n"+name+"")
            }
//            adapter.notifyDataSetChanged()
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
            Log.d("AAA", e.toString())
        }
        return content.toString()
    }




}