package com.example.khoa_luan_tot_nghiep.Holder.NhaSi

import android.content.Intent
import android.view.View
import android.widget.RelativeLayout
import android.widget.TextView
import android.widget.Toast
import androidx.recyclerview.widget.RecyclerView
import com.example.khoa_luan_tot_nghiep.Entity.NhaSi.NhaSi
import com.example.khoa_luan_tot_nghiep.Entity.NhaSi.NhaSi_Vande
import com.example.khoa_luan_tot_nghiep.MainActivity
import com.example.khoa_luan_tot_nghiep.R

class NhaSi_Vande_ViewHolder(v: View): RecyclerView.ViewHolder(v) {
    private  val ten_van_de : TextView = v.findViewById(R.id.S_NAME_NhaSi_VanDe)
    private  val rlRoon : RelativeLayout = v.findViewById(R.id.rlRoot_NhaSi_VanDe)

    fun bind(nhasi_vande: NhaSi_Vande) {
        ten_van_de.text = nhasi_vande.tendv
        clickEvent(nhasi_vande)
    }

    private fun clickEvent(nhasi_vande : NhaSi_Vande) {
        rlRoon.setOnClickListener {
            val i = Intent(rlRoon.context, MainActivity::class.java)
//            i.putExtra("nhasi",nhasi_vande.)
//            i.putExtra("nhom",nhasi.id_nhom_vd)
 //           rlRoon.context.startActivity(i)
            Toast.makeText(
                rlRoon.context,
                "Đã nhấn id ${nhasi_vande.tendv} có tên ${nhasi_vande.motadv} ",
                Toast.LENGTH_SHORT
            ).show()

        }

    }

}