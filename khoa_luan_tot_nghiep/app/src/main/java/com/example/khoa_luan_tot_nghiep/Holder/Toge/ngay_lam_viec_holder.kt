package com.example.khoa_luan_tot_nghiep.Holder.Toge

import android.content.Intent
import android.os.AsyncTask
import android.util.Log
import android.view.View
import android.widget.*
import androidx.recyclerview.widget.LinearLayoutManager
import androidx.recyclerview.widget.RecyclerView
import com.example.khoa_luan_tot_nghiep.Adapter.Toge.time_adapter
import com.example.khoa_luan_tot_nghiep.Entity.Toge.ngay_lam_viec
import com.example.khoa_luan_tot_nghiep.Entity.Toge.time
import com.example.khoa_luan_tot_nghiep.R
import com.example.khoa_luan_tot_nghiep.View.NhaSi.Detail_NhaSi
import com.example.khoa_luan_tot_nghiep.View.NhaSi.Show_NhaSi_VanDe
import com.example.khoa_luan_tot_nghiep.View.Toge.time_VD
import org.json.JSONArray
import org.json.JSONObject
import java.io.BufferedReader
import java.io.InputStreamReader
import java.net.HttpURLConnection
import java.net.URL
import java.util.*

class ngay_lam_viec_holder (v: View): RecyclerView.ViewHolder(v) {

    private val ngay: TextView = v.findViewById(R.id.show_ngay)

    private val rlRoon: RelativeLayout = v.findViewById(R.id.rlRoot_get_day_toge)


    fun bind(ngay_lam_viec:ngay_lam_viec) {
    ngay.text = ngay_lam_viec.ngay




        clickEvent(ngay_lam_viec)
    }

    private fun clickEvent(ngay_lam_viec: ngay_lam_viec) {
        rlRoon.setOnClickListener {
            var cal1 = Calendar.getInstance()
            var ngayhn1 = cal1.get(Calendar.DATE).toInt()
            var thang1 = cal1.get(Calendar.MONTH).toInt()
            var nam1 = cal1.get(Calendar.YEAR).toInt()
            val i = Intent(rlRoon.context, time_VD::class.java)
            if(ngay_lam_viec.nam.toInt() < nam1 ){
                Toast.makeText(rlRoon.context,"da qua thoi gian nay",Toast.LENGTH_SHORT).show()
            }
             else if(ngay_lam_viec.nam.toInt() == nam1 && ngay_lam_viec.thang.toInt() == thang1 && ngay_lam_viec.day.toInt() < ngayhn1 ){
                Toast.makeText(rlRoon.context,"da qua thoi gian nay",Toast.LENGTH_SHORT).show()
            }
            else {
                Toast.makeText(rlRoon.context,"${ngayhn1} va ${thang1}",Toast.LENGTH_SHORT).show()

                i.putExtra("idns", ngay_lam_viec.idns)
                i.putExtra("ngay", ngay_lam_viec.ngay)
                i.putExtra("dichvu", ngay_lam_viec.iddv)

                rlRoon.context.startActivity(i)
            }
        }

    }

}