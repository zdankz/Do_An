package com.example.khoa_luan_tot_nghiep.Adapter.VanDe

import android.view.LayoutInflater
import android.view.ViewGroup
import androidx.recyclerview.widget.RecyclerView
import com.example.khoa_luan_tot_nghiep.Entity.NhaSi.NhaSi_Vande
import com.example.khoa_luan_tot_nghiep.Entity.VanDe.Vande_NhaSi
import com.example.khoa_luan_tot_nghiep.Holder.NhaSi.NhaSi_Vande_ViewHolder
import com.example.khoa_luan_tot_nghiep.Holder.VanDe.VanDe_NhaSi_ViewHolder
import com.example.khoa_luan_tot_nghiep.R

class Vande_NhaSi_Adapter(val vande_nhasis : ArrayList<Vande_NhaSi>) :
    RecyclerView.Adapter<VanDe_NhaSi_ViewHolder>(){
    override fun onCreateViewHolder(parent: ViewGroup, viewType: Int): VanDe_NhaSi_ViewHolder
    {
        val v = LayoutInflater.from(parent.context).inflate(R.layout.item_vande_nhasi, parent,false)
        return VanDe_NhaSi_ViewHolder(v)
    }
    override fun getItemCount(): Int {
        return vande_nhasis.size
    }
    override fun onBindViewHolder(holder: VanDe_NhaSi_ViewHolder, position: Int) {
        val vande_nhasiss = vande_nhasis[position]
        holder.bind(vande_nhasiss)
    }

}