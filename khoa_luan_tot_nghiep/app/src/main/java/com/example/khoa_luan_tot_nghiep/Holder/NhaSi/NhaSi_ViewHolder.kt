package com.example.khoa_luan_tot_nghiep.Holder.NhaSi

import android.content.Intent
import android.view.View
import android.widget.ImageView
import android.widget.RelativeLayout
import android.widget.TextView
import android.widget.Toast
import androidx.recyclerview.widget.RecyclerView
import com.example.khoa_luan_tot_nghiep.Entity.NhaSi.NhaSi
import com.example.khoa_luan_tot_nghiep.MainActivity
import com.example.khoa_luan_tot_nghiep.R
import com.example.khoa_luan_tot_nghiep.View.NhaSi.Show_NhaSi_VanDe
import kotlinx.android.synthetic.main.item_nhasi.view.*

class NhaSi_ViewHolder (v: View): RecyclerView.ViewHolder(v) {
    private  val ten_nha_si : TextView = v.findViewById(R.id.S_NAME_NhaSi)
    private  val rlRoon : RelativeLayout = v.findViewById(R.id.rlRoot_NhaSi)
    private  val avata : ImageView = v.findViewById(R.id.ivUserAvatar_NhaSi)

    fun bind(nhasi: NhaSi) {
//        Glide.with(this)
//                .load(anh).placeholder(R.drawable.ic_home).
//                error(R.drawable.ic_booking).override(150,150).into(igm_load)
//        book.setOnClickListener {
//            val i = Intent(this,register::class.java)
//            i.putExtra("tenbenh",ten)
//            i.putExtra("idvande",idvande)
//            startActivity(i)


        ten_nha_si.text = nhasi.ten_nhasi
        clickEvent(nhasi)
    }

    private fun clickEvent(nhasi : NhaSi) {
        rlRoon.setOnClickListener {
            val i = Intent(rlRoon.context, Show_NhaSi_VanDe::class.java)
            i.putExtra("nhasi",nhasi.id_nhasi)
            i.putExtra("nhom",nhasi.id_nhom_vd)
            Toast.makeText(
                rlRoon.context,
                "Đã nhấn id ${nhasi.id_nhasi} có tên ${nhasi.ten_nhasi} va thuoc nhom ${nhasi.id_nhom_vd} ",
                Toast.LENGTH_SHORT
            ).show()
            rlRoon.context.startActivity(i)

        }

    }

}