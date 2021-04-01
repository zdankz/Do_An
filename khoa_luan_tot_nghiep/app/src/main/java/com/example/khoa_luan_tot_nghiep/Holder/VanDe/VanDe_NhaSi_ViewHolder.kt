package com.example.khoa_luan_tot_nghiep.Holder.VanDe

import android.content.Intent
import android.view.View
import android.widget.RelativeLayout
import android.widget.TextView
import android.widget.Toast
import androidx.recyclerview.widget.RecyclerView
import com.example.khoa_luan_tot_nghiep.Entity.NhaSi.NhaSi_Vande
import com.example.khoa_luan_tot_nghiep.Entity.VanDe.Vande_NhaSi
import com.example.khoa_luan_tot_nghiep.MainActivity
import com.example.khoa_luan_tot_nghiep.R

class VanDe_NhaSi_ViewHolder (v: View): RecyclerView.ViewHolder(v) {
    private  val ten_nha_si : TextView = v.findViewById(R.id.S_NAME_Vande_NhaSi)
    private  val rlRoon : RelativeLayout = v.findViewById(R.id.rlRoot_VanDe_NhaSi)

    fun bind(vande_nhasi: Vande_NhaSi) {
        ten_nha_si.text = vande_nhasi.tenns
        clickEvent(vande_nhasi)
    }

    private fun clickEvent(vande_nhasi : Vande_NhaSi) {
        rlRoon.setOnClickListener {
//            val i = Intent(rlRoon.context, MainActivity::class.java)
//            i.putExtra("nhasi",nhasi_vande.)
//            i.putExtra("nhom",nhasi.id_nhom_vd)
            //           rlRoon.context.startActivity(i)
            Toast.makeText(
                rlRoon.context,
                "Đã nhấn id ${vande_nhasi.id_ns} có tên ${vande_nhasi.sodt} ",
                Toast.LENGTH_SHORT
            ).show()

        }

    }

}