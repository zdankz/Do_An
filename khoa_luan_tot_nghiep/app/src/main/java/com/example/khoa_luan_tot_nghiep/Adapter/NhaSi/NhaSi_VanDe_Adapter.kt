package com.example.khoa_luan_tot_nghiep.Adapter.NhaSi

import android.view.LayoutInflater
import android.view.ViewGroup
import androidx.recyclerview.widget.RecyclerView
import com.example.khoa_luan_tot_nghiep.Entity.NhaSi.NhaSi
import com.example.khoa_luan_tot_nghiep.Entity.NhaSi.NhaSi_Vande
import com.example.khoa_luan_tot_nghiep.Holder.NhaSi.NhaSi_Vande_ViewHolder
import com.example.khoa_luan_tot_nghiep.Holder.NhaSi.NhaSi_ViewHolder
import com.example.khoa_luan_tot_nghiep.R

class NhaSi_VanDe_Adapter (val nhasi_vandes : ArrayList<NhaSi_Vande>) :
    RecyclerView.Adapter<NhaSi_Vande_ViewHolder>(){
    override fun onCreateViewHolder(parent: ViewGroup, viewType: Int): NhaSi_Vande_ViewHolder {
        val v = LayoutInflater.from(parent.context).inflate(R.layout.item_nhasi_vande, parent,false)
        return NhaSi_Vande_ViewHolder(v)
    }
    override fun getItemCount(): Int {

        return nhasi_vandes.size
    }
    override fun onBindViewHolder(holder: NhaSi_Vande_ViewHolder, position: Int) {

        val nhasi_vandess = nhasi_vandes[position]
        holder.bind(nhasi_vandess)
    }

}