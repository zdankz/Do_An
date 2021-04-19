package com.example.khoa_luan_tot_nghiep.Holder.NhaSi

import android.content.Intent
import android.view.View
import android.widget.*
import androidx.recyclerview.widget.RecyclerView
import com.bumptech.glide.Glide
import com.example.khoa_luan_tot_nghiep.Entity.NhaSi.NhaSi
import com.example.khoa_luan_tot_nghiep.MainActivity
import com.example.khoa_luan_tot_nghiep.R
import com.example.khoa_luan_tot_nghiep.View.NhaSi.Detail_NhaSi
import com.example.khoa_luan_tot_nghiep.View.NhaSi.Show_NhaSi_VanDe
import kotlinx.android.synthetic.main.item_nhasi.view.*

class NhaSi_ViewHolder (v: View): RecyclerView.ViewHolder(v) {
    private  val ten_nha_si : TextView = v.findViewById(R.id.S_NAME_NhaSi)
    private  val mo_ta_nha_si : TextView = v.findViewById(R.id.S_MOTA_NhaSi)
    private  val rlRoon : RelativeLayout = v.findViewById(R.id.rlRoot_NhaSi)
    private  val avata : ImageView = v.findViewById(R.id.ivUserAvatar_NhaSi)
    private val button : Button = v.findViewById(R.id.detail_nhasi)

    fun bind(nhasi: NhaSi) {
        val anh : String = nhasi.hinhanh
//        Glide.with(this)
//                .load(anh).placeholder(R.drawable.ic_home).
//                error(R.drawable.ic_booking).override(150,150).into(igm_load)
        Glide.with(rlRoon.context)
                .load(nhasi.hinhanh).placeholder(R.drawable.ic_load_avata_24).
                error(R.drawable.ic_load_avata_24).override(100,100).into(avata)

        ten_nha_si.text = nhasi.ten_nhasi
        mo_ta_nha_si.text = nhasi.id_nhasi


        clickEvent(nhasi)
    }

    private fun clickEvent(nhasi : NhaSi) {
        rlRoon.setOnClickListener {
            val i = Intent(rlRoon.context, Show_NhaSi_VanDe::class.java)
            i.putExtra("nhasi",nhasi.id_nhasi)
            i.putExtra("nhom",nhasi.id_nhom_vd)
            Toast.makeText(
                rlRoon.context,
                "Đã nhấn id ${nhasi.id_nhasi} có tên ${nhasi.ten_nhasi} va thuoc nhom ${nhasi.id_nhom_vd} va hinh anh ${nhasi.hinhanh} ",
                Toast.LENGTH_SHORT
            ).show()
            rlRoon.context.startActivity(i)

        }
        button.setOnClickListener {
            val i = Intent(rlRoon.context,Detail_NhaSi::class.java)
            i.putExtra("ten",nhasi.ten_nhasi)
            i.putExtra("hinhanh",nhasi.hinhanh)
            i.putExtra("sdt",nhasi.so_dt)
            i.putExtra("gioitinh",nhasi.gioi_tinh)
            i.putExtra("trinhdo",nhasi.trinhdo)
            i.putExtra("lich",nhasi.lich)
            i.putExtra("gioithieu",nhasi.gioithieu)
            rlRoon.context.startActivity(i)
        }



    }

}