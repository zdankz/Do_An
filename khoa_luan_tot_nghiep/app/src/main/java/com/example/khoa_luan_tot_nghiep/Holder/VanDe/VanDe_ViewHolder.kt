package com.example.khoa_luan_tot_nghiep.Holder.VanDe

import android.content.Intent
import android.view.View
import android.widget.RelativeLayout
import android.widget.TextView
import android.widget.Toast
import androidx.recyclerview.widget.RecyclerView
import com.example.khoa_luan_tot_nghiep.Entity.NhaSi.NhaSi
import com.example.khoa_luan_tot_nghiep.Entity.VanDe.VanDe
import com.example.khoa_luan_tot_nghiep.R
import com.example.khoa_luan_tot_nghiep.View.NhaSi.Show_NhaSi_VanDe
import com.example.khoa_luan_tot_nghiep.View.VanDe.Show_Vande_NhaSi

class VanDe_ViewHolder (v: View): RecyclerView.ViewHolder(v) {
    private  val ten_van_de : TextView = v.findViewById(R.id.S_NAME_VanDe)
    private  val rlRoon : RelativeLayout = v.findViewById(R.id.rlRoot_VanDe)

    fun bind(vandes: VanDe) {
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

    }

}