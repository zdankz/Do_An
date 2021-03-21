package com.example.dangkykham.holder

import android.content.Intent
import android.content.res.Resources
import android.view.View
import android.widget.ImageView
import android.widget.RelativeLayout
import android.widget.TextView
import android.widget.Toast
import androidx.core.content.ContextCompat
import androidx.recyclerview.widget.RecyclerView
import com.bumptech.glide.Glide
import com.example.dangkykham.R
import com.example.dangkykham.V.detail_vande
import com.example.dangkykham.entity.Vande
import com.squareup.picasso.Picasso


class VandeViewHolder(v: View) : RecyclerView.ViewHolder(v) {
    private val ivUserAvata : ImageView = v.findViewById(R.id.ivUserAvatar)
    private val tvUsername: TextView = v.findViewById(R.id.S_NAME)
    private val rlRoot : RelativeLayout = v.findViewById(R.id.rlRoot)


    fun bind(vande: Vande) {
        // get ID cho IMage get về
        val tenanh: String = vande.img
//        Glide.with(rlRoot.context).load(tenanh).into(ivUserAvata)
//        Picasso.with(rlRoot.context).load(tenanh).into(ivUserAvata)

        tvUsername.text = vande.tenvande



        //val motavande : String? = vande.mota

        //event
        clickEvent(vande)
    }

    private fun clickEvent(vande: Vande) {
            rlRoot.setOnClickListener{
            val i = Intent(rlRoot.context,detail_vande::class.java)
            val namevande : String? = vande.tenvande
            val motavande2: String? = vande.mota
            val img1 : String? = vande.img
            i.putExtra("name",namevande)
            i.putExtra("mota",motavande2)
                i.putExtra("anh",img1)
                i.putExtra("idvande",vande.idvande)
            rlRoot.context.startActivity(i)
            Toast.makeText(
                rlRoot.context,
                "Đã nhấn id ${vande.tenvande} có tên ${vande.mota} và ${vande.img}",
                Toast.LENGTH_SHORT
            ).show()

        }
    }


}