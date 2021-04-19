package com.example.khoa_luan_tot_nghiep.Adapter.Toge

import android.view.LayoutInflater
import android.view.ViewGroup
import androidx.recyclerview.widget.RecyclerView
import com.example.khoa_luan_tot_nghiep.Entity.Toge.ngay_lam_viec
import com.example.khoa_luan_tot_nghiep.Holder.Toge.ngay_lam_viec_holder
import com.example.khoa_luan_tot_nghiep.R

class ngay_lam_viec_adapter (val ngay_lam_viec : ArrayList<ngay_lam_viec>) :
        RecyclerView.Adapter<ngay_lam_viec_holder>(){
    override fun onCreateViewHolder(parent: ViewGroup, viewType: Int): ngay_lam_viec_holder {
        //   TODO("Not yet implemented")
        val v = LayoutInflater.from(parent.context).inflate(R.layout.tem_get_day_toge, parent,false)
        return ngay_lam_viec_holder(v)
    }

    override fun getItemCount(): Int {
        //     TODO("Not yet implemented")
        return ngay_lam_viec.size
    }

//    override fun onBindViewHolder(holder: NhaSi_ViewHolder, position: Int) {
//        //     TODO("Not yet implemented")
//        val nhasiss = nhasis[position]
//        holder.bind(nhasiss)
//
//    }

    override fun onBindViewHolder(holder: ngay_lam_viec_holder, position: Int) {
    //    TODO("Not yet implemented")
        val ngay_lv = ngay_lam_viec[position]
        holder.bind(ngay_lv)
    }

}