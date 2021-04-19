package com.example.khoa_luan_tot_nghiep.Adapter.VanDe

import android.view.LayoutInflater
import android.view.ViewGroup
import androidx.recyclerview.widget.RecyclerView
import com.example.khoa_luan_tot_nghiep.Entity.VanDe.VanDe
import com.example.khoa_luan_tot_nghiep.Entity.VanDe.Vande_Home
import com.example.khoa_luan_tot_nghiep.Holder.VanDe.VanDe_ViewHolder
import com.example.khoa_luan_tot_nghiep.Holder.VanDe.Vande_Home_holder
import com.example.khoa_luan_tot_nghiep.R

class Vande_Home_Adapter(val vandes : ArrayList<Vande_Home>) :
    RecyclerView.Adapter<Vande_Home_holder>(){
    override fun onCreateViewHolder(parent: ViewGroup, viewType: Int): Vande_Home_holder {
        //   TODO("Not yet implemented")
        val v = LayoutInflater.from(parent.context).inflate(R.layout.item_vande_home, parent,false)
        return Vande_Home_holder(v)
    }

    override fun getItemCount(): Int {
        //     TODO("Not yet implemented")
        return vandes.size
    }

//    override fun onBindViewHolder(holder: VanDe_ViewHolder, position: Int) {
//        // TODO("Not yet implemented")
//        val vandess = vandes[position]
//        holder.bind(vandess)
//    }

    override fun onBindViewHolder(holder: Vande_Home_holder, position: Int) {
//        TODO("Not yet implemented")
        val vandess = vandes[position]
        holder.bind(vandess)
    }

}