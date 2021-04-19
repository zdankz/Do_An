package com.example.khoa_luan_tot_nghiep.Holder.VanDe

import android.content.Intent
import android.view.View
import android.widget.*
import androidx.recyclerview.widget.RecyclerView
import com.bumptech.glide.Glide
import com.bumptech.glide.request.RequestOptions
import com.example.khoa_luan_tot_nghiep.Entity.NhaSi.NhaSi_Vande
import com.example.khoa_luan_tot_nghiep.Entity.VanDe.Vande_NhaSi
import com.example.khoa_luan_tot_nghiep.MainActivity
import com.example.khoa_luan_tot_nghiep.R
import com.example.khoa_luan_tot_nghiep.View.Toge.show_lich
import com.example.khoa_luan_tot_nghiep.View.VanDe.Detail_VanDe_NhaSi

class VanDe_NhaSi_ViewHolder (v: View): RecyclerView.ViewHolder(v) {
    private  val ten_nha_si : TextView = v.findViewById(R.id.S_NAME_Vande_NhaSi)
    private  val rlRoon : RelativeLayout = v.findViewById(R.id.rlRoot_VanDe_NhaSi)
    private val buton : Button = v.findViewById(R.id.detail_vande_nhasi)
    private  val avata : ImageView = v.findViewById(R.id.ivUserAvatar_Vande_NhaSi)

    fun bind(vande_nhasi: Vande_NhaSi) {
        ten_nha_si.text = vande_nhasi.tenns
        Glide.with(rlRoon.context)
            .load(vande_nhasi.hinhanh).placeholder(R.drawable.ic_load_avata_24).
            error(R.drawable.ic_load_avata_24).override(100,100).into(avata)
        clickEvent(vande_nhasi)
    }

    private fun clickEvent(vande_nhasi : Vande_NhaSi) {
        rlRoon.setOnClickListener {
            val i = Intent(rlRoon.context, show_lich::class.java)
            i.putExtra("id_dv",vande_nhasi.iddv)
            i.putExtra("id_ns",vande_nhasi.id_ns )
             rlRoon.context.startActivity(i)

        }
        buton.setOnClickListener {
            val i = Intent(rlRoon.context,Detail_VanDe_NhaSi::class.java)
                i.putExtra("idbs",vande_nhasi.id_ns)
                i.putExtra("hinhanh",vande_nhasi.hinhanh)
                i.putExtra("ten", vande_nhasi.tenns)
                i.putExtra("lich",vande_nhasi.lich)
            i.putExtra("gioitinh",vande_nhasi.gioitinh)
            i.putExtra("trinhdo",vande_nhasi.trinhdo)
            i.putExtra("gioithieu",vande_nhasi.gioithieu)
            rlRoon.context.startActivity(i)
        }

    }

}