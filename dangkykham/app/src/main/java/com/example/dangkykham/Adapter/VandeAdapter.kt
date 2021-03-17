package com.example.dangkykham.Adapter

import android.view.LayoutInflater
import android.view.ViewGroup
import androidx.recyclerview.widget.RecyclerView
import com.example.dangkykham.R
import com.example.dangkykham.entity.Vande
import com.example.dangkykham.holder.VandeViewHolder

class VandeAdapter(val vandes: ArrayList<Vande>) : RecyclerView.Adapter<VandeViewHolder>() {
    override fun onCreateViewHolder(parent: ViewGroup, viewType: Int): VandeViewHolder {
        //TODO("Not yet implemented")
        val v = LayoutInflater.from(parent.context).inflate(R.layout.item_vande_layout, parent,false)
        return VandeViewHolder(v)
    }

    override fun getItemCount(): Int {
       // TODO("Not yet implemented")
        return vandes.size
    }

    override fun onBindViewHolder(holder: VandeViewHolder, position: Int) {
       // TODO("Not yet implemented")
        val vandee = vandes[position]
        holder.bind(vandee)
    }


}