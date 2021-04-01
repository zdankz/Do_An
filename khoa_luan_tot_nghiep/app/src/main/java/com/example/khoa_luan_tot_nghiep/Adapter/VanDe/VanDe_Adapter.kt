package com.example.khoa_luan_tot_nghiep.Adapter.VanDe

import android.view.LayoutInflater
import android.view.ViewGroup
import androidx.recyclerview.widget.RecyclerView
import com.example.khoa_luan_tot_nghiep.Entity.NhaSi.NhaSi
import com.example.khoa_luan_tot_nghiep.Entity.VanDe.VanDe
import com.example.khoa_luan_tot_nghiep.Holder.NhaSi.NhaSi_ViewHolder
import com.example.khoa_luan_tot_nghiep.Holder.VanDe.VanDe_ViewHolder
import com.example.khoa_luan_tot_nghiep.R

class VanDe_Adapter (val vandes : ArrayList<VanDe>) :
    RecyclerView.Adapter<VanDe_ViewHolder>(){
    override fun onCreateViewHolder(parent: ViewGroup, viewType: Int): VanDe_ViewHolder {
        //   TODO("Not yet implemented")
        val v = LayoutInflater.from(parent.context).inflate(R.layout.item_vande, parent,false)
        return VanDe_ViewHolder(v)
    }

    override fun getItemCount(): Int {
        //     TODO("Not yet implemented")
        return vandes.size
    }

    override fun onBindViewHolder(holder: VanDe_ViewHolder, position: Int) {
       // TODO("Not yet implemented")
         val vandess = vandes[position]
        holder.bind(vandess)
    }

}