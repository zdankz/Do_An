package com.example.khoa_luan_tot_nghiep.Adapter.NhaSi

import android.view.LayoutInflater
import android.view.ViewGroup
import androidx.recyclerview.widget.RecyclerView
import com.example.khoa_luan_tot_nghiep.Entity.NhaSi.NhaSi
import com.example.khoa_luan_tot_nghiep.Holder.NhaSi.NhaSi_ViewHolder
import com.example.khoa_luan_tot_nghiep.R

class NhaSi_Adapter (val nhasis : ArrayList<NhaSi>) :
RecyclerView.Adapter<NhaSi_ViewHolder>(){
    override fun onCreateViewHolder(parent: ViewGroup, viewType: Int): NhaSi_ViewHolder {
     //   TODO("Not yet implemented")
        val v = LayoutInflater.from(parent.context).inflate(R.layout.item_nhasi, parent,false)
        return NhaSi_ViewHolder(v)
    }

    override fun getItemCount(): Int {
   //     TODO("Not yet implemented")
        return nhasis.size
    }

    override fun onBindViewHolder(holder: NhaSi_ViewHolder, position: Int) {
   //     TODO("Not yet implemented")
        val nhasiss = nhasis[position]
        holder.bind(nhasiss)

    }

}