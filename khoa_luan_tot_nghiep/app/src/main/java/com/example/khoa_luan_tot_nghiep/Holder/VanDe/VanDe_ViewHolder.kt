package com.example.khoa_luan_tot_nghiep.Holder.VanDe

import android.content.Intent
import android.view.View
import android.widget.*
import androidx.recyclerview.widget.RecyclerView
import com.bumptech.glide.Glide
import com.example.khoa_luan_tot_nghiep.Entity.NhaSi.NhaSi
import com.example.khoa_luan_tot_nghiep.Entity.VanDe.VanDe
import com.example.khoa_luan_tot_nghiep.R
import com.example.khoa_luan_tot_nghiep.View.NhaSi.Show_NhaSi_VanDe
import com.example.khoa_luan_tot_nghiep.View.VanDe.Detail_Vande
import com.example.khoa_luan_tot_nghiep.View.VanDe.Show_Vande_NhaSi

class VanDe_ViewHolder (v: View): RecyclerView.ViewHolder(v) {
    private  val ten_van_de : TextView = v.findViewById(R.id.S_NAME_VanDe)
    private  val rlRoon : RelativeLayout = v.findViewById(R.id.rlRoot_VanDe)
    private val buton : Button = v.findViewById(R.id.detail_vande)
    private val avata : ImageView = v.findViewById(R.id.ivUserAvatar_VanDe)

    fun bind(vandes: VanDe) {
        Glide.with(rlRoon.context)
            .load(vandes.hinhanh).placeholder(R.drawable.ic_load_avata_24).
            error(R.drawable.ic_load_avata_24).override(100,100).into(avata)
        ten_van_de.text = vandes.ten_vande
        clickEvent(vandes)
    }

    private fun clickEvent(vandes: VanDe ) {
        rlRoon.setOnClickListener {
            val i = Intent(rlRoon.context, Show_Vande_NhaSi::class.java)
            i.putExtra("vande",vandes.id_vd)
            //i.putExtra("nhom",nhasi.id_nhom_vd)
            Toast.makeText(
                rlRoon.context,
                "Đã nhấn id ${vandes.id_vd} có tên ${vandes.ten_vande} va thuoc nhom ${vandes.id_nhvd} ",
                Toast.LENGTH_SHORT
            ).show()
         rlRoon.context.startActivity(i)

        }
        buton.setOnClickListener {
            val inn = Intent(rlRoon.context,Detail_Vande::class.java)
            inn.putExtra("tenvd",vandes.ten_vande)
            inn.putExtra("idvd",vandes.id_vd)
            inn.putExtra("mota",vandes.mota)
            inn.putExtra("chiphi",vandes.chiphi)
            inn.putExtra("hinhanh",vandes.hinhanh)
            inn.putExtra("time",vandes.time)
            rlRoon.context.startActivity(inn)
        }

    }

}