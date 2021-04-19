package com.example.khoa_luan_tot_nghiep.Holder.NhaSi

import android.content.Intent
import android.os.AsyncTask
import android.text.method.TextKeyListener.clear
import android.util.Log
import android.view.View
import android.widget.*
import androidx.recyclerview.widget.LinearLayoutManager
import androidx.recyclerview.widget.RecyclerView
import com.bumptech.glide.Glide
import com.example.khoa_luan_tot_nghiep.Adapter.Toge.ngay_lam_viec_adapter
import com.example.khoa_luan_tot_nghiep.Adapter.Toge.time_adapter
import com.example.khoa_luan_tot_nghiep.Entity.NhaSi.NhaSi
import com.example.khoa_luan_tot_nghiep.Entity.NhaSi.NhaSi_Vande
import com.example.khoa_luan_tot_nghiep.Entity.Toge.ngay_lam_viec
import com.example.khoa_luan_tot_nghiep.Entity.Toge.time
import com.example.khoa_luan_tot_nghiep.MainActivity
import com.example.khoa_luan_tot_nghiep.R
import com.example.khoa_luan_tot_nghiep.View.NhaSi.Detail_NhaSi_Vande
import com.example.khoa_luan_tot_nghiep.View.Toge.show_lich
import kotlinx.android.synthetic.main.activity_show_lich.*
import org.json.JSONArray
import org.json.JSONObject
import java.io.BufferedReader
import java.io.InputStreamReader
import java.net.HttpURLConnection
import java.net.URL

class NhaSi_Vande_ViewHolder(v: View): RecyclerView.ViewHolder(v) {
    private  val ten_van_de : TextView = v.findViewById(R.id.S_NAME_NhaSi_VanDe)
    private  val rlRoon : RelativeLayout = v.findViewById(R.id.rlRoot_NhaSi_VanDe)
   private  val avata_vande : ImageView = v.findViewById(R.id.ivUserAvatar_NhaSi_VanDe)
    private  val button : Button = v.findViewById(R.id.detail_nhasi_vande)
    fun bind(nhasi_vande: NhaSi_Vande) {
        Glide.with(rlRoon.context)
                .load(nhasi_vande.hinhanhdv).placeholder(R.drawable.ic_load_avata_24).
                error(R.drawable.ic_load_avata_24).override(100,100).into(avata_vande)
        ten_van_de.text = nhasi_vande.tendv
        clickEvent(nhasi_vande)
    }
    private fun clickEvent(nhasi_vande : NhaSi_Vande) {
        rlRoon.setOnClickListener {
            val i = Intent(rlRoon.context, show_lich::class.java)
            i.putExtra("id_dv",nhasi_vande.iddv)
            i.putExtra("id_ns",nhasi_vande.idns )
            rlRoon.context.startActivity(i)

        }
        button.setOnClickListener {
            val inn = Intent(rlRoon.context,Detail_NhaSi_Vande::class.java)
            inn.putExtra("tendv",nhasi_vande.tendv)
            inn.putExtra("iddv",nhasi_vande.iddv)
            inn.putExtra("motadv",nhasi_vande.motadv)
            inn.putExtra("chiphi",nhasi_vande.chiphi)
            inn.putExtra("hinhanh",nhasi_vande.hinhanhdv)
            inn.putExtra("time",nhasi_vande.time)
            rlRoon.context.startActivity(inn)
        }
    }
}