package com.example.khoa_luan_tot_nghiep.Holder.VanDe

import android.view.View
import android.widget.Button
import android.widget.ImageView
import android.widget.RelativeLayout
import android.widget.TextView
import androidx.recyclerview.widget.RecyclerView
import com.bumptech.glide.Glide
import com.example.khoa_luan_tot_nghiep.Entity.VanDe.VanDe
import com.example.khoa_luan_tot_nghiep.Entity.VanDe.Vande_Home
import com.example.khoa_luan_tot_nghiep.R

class Vande_Home_holder(v: View): RecyclerView.ViewHolder(v) {
    private  val ten_van_de : TextView = v.findViewById(R.id.ten_vande_home)
    private  val rlRoon : RelativeLayout = v.findViewById(R.id.iv_VanDe_HOME)
    private val mota : TextView = v.findViewById(R.id.mota_vande_home)
    private val avata : ImageView = v.findViewById(R.id.avata_vande_home)

    fun bind(vandes: Vande_Home) {
        Glide.with(rlRoon.context)
            .load(vandes.hinh).placeholder(R.drawable.ic_load_avata_24).
            error(R.drawable.ic_load_avata_24).override(100,100).into(avata)
        ten_van_de.text = vandes.tenvd
        mota.text = vandes.mota
        //clickEvent(vandes)
    }

//    private fun clickEvent(vandes: VanDe) {
//
//
//    }

}