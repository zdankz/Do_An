package com.example.khoa_luan_tot_nghiep.Adapter.NhaSi

import android.view.LayoutInflater
import android.view.ViewGroup
import androidx.recyclerview.widget.RecyclerView
import com.example.khoa_luan_tot_nghiep.Entity.NhaSi.NhaSi
import com.example.khoa_luan_tot_nghiep.Entity.NhaSi.NhaSi_Home
import com.example.khoa_luan_tot_nghiep.Holder.NhaSi.NhaSi_Home_Holder
import com.example.khoa_luan_tot_nghiep.Holder.NhaSi.NhaSi_ViewHolder
import com.example.khoa_luan_tot_nghiep.R

class NhaSi_Home_Adapter (val nhasi_home : ArrayList<NhaSi_Home>) :
        RecyclerView.Adapter<NhaSi_Home_Holder>(){
    override fun onCreateViewHolder(parent: ViewGroup, viewType: Int): NhaSi_Home_Holder {
        //   TODO("Not yet implemented")
        val v = LayoutInflater.from(parent.context).inflate(R.layout.item_home_nha_si, parent,false)
        return NhaSi_Home_Holder(v)
    }

    override fun getItemCount(): Int {
        //     TODO("Not yet implemented")
        return nhasi_home.size
    }

//    override fun onBindViewHolder(holder: NhaSi_ViewHolder, position: Int) {
//        //     TODO("Not yet implemented")
//        val nhasiss = nhasis[position]
//        holder.bind(nhasiss)
//
//    }

    override fun onBindViewHolder(holder: NhaSi_Home_Holder, position: Int) {
        //TODO("Not yet implemented")
        val nhassiii = nhasi_home[position]
        holder.bind(nhassiii)
    }

}