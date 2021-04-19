package com.example.khoa_luan_tot_nghiep.Holder.NhaSi

import android.content.Intent
import android.view.View
import android.widget.ImageView
import android.widget.RelativeLayout
import android.widget.TextView
import androidx.recyclerview.widget.RecyclerView
import com.bumptech.glide.Glide
import com.bumptech.glide.request.RequestOptions
import com.example.khoa_luan_tot_nghiep.Entity.NhaSi.NhaSi_Home
import com.example.khoa_luan_tot_nghiep.Entity.NhaSi.NhaSi_Vande
import com.example.khoa_luan_tot_nghiep.R
import com.example.khoa_luan_tot_nghiep.View.NhaSi.Detail_NhaSi_Vande
import com.example.khoa_luan_tot_nghiep.View.Toge.show_lich

class NhaSi_Home_Holder(v: View): RecyclerView.ViewHolder(v) {
    private  val ron  : RelativeLayout = v.findViewById(R.id.iv_NhaSIHOME)
    private val ten :TextView = v.findViewById(R.id.ten_home)
    private val sdt :TextView = v.findViewById(R.id.so_dien_thoai_nha_si_home)
    private val gioitinh :TextView = v.findViewById(R.id.gioi_tinh_nha_si_home)
    private val trinhdo :TextView = v.findViewById(R.id.trinh_do_nha_si_home)
    private val lich :TextView = v.findViewById(R.id.lich_nha_si_home)
    private val gioithieu :TextView = v.findViewById(R.id.gioi_thieu_nha_si_home)
    private  val avata : ImageView = v.findViewById(R.id.anh_avata_nhasi)
    //private val ten :TextView = v.findViewById(R.id.ten_home)

    fun bind(nhasi: NhaSi_Home) {
        Glide.with(ron.context)
                .load(nhasi.hinhanh).placeholder(R.drawable.ic_load_avata_24).
                error(R.drawable.ic_load_avata_24).apply(RequestOptions.circleCropTransform()).override(100,100).into(avata)
//        ten_van_de.text = nhasi_vande.tendv
        ten.text = nhasi.ten
        sdt.text = nhasi.sdt
        gioithieu.text = nhasi.gioithieu
        gioitinh.text = nhasi.gioitinh
        lich.text = nhasi.lich
        trinhdo.text = nhasi.trinhdo

        //clickEvent(nhasi_vande)
    }
//    private fun clickEvent(nhasi : NhaSi_Home) {
//
//    }
}