package com.example.khoa_luan_tot_nghiep.Adapter.Toge

import android.view.LayoutInflater
import android.view.ViewGroup
import androidx.recyclerview.widget.RecyclerView
import com.example.khoa_luan_tot_nghiep.Entity.Toge.ngay_lam_viec
import com.example.khoa_luan_tot_nghiep.Entity.Toge.time
import com.example.khoa_luan_tot_nghiep.Holder.Toge.ngay_lam_viec_holder
import com.example.khoa_luan_tot_nghiep.Holder.Toge.time_holder
import com.example.khoa_luan_tot_nghiep.R

class time_adapter(val times : ArrayList<time>) :
        RecyclerView.Adapter<time_holder>(){
    override fun onCreateViewHolder(parent: ViewGroup, viewType: Int): time_holder {
        //   TODO("Not yet implemented")
        val v = LayoutInflater.from(parent.context).inflate(R.layout.item_show_time_theo_ngay, parent,false)
        return time_holder(v)
    }

    override fun getItemCount(): Int {
        //     TODO("Not yet implemented")
        return times.size
    }


//    override fun onBindViewHolder(holder: ngay_lam_viec_holder, position: Int) {
//        //    TODO("Not yet implemented")
//        val ngay_lv = ngay_lam_viec[position]
//        holder.bind(ngay_lv)
//    }

    override fun onBindViewHolder(holder: time_holder, position: Int) {
      //  TODO("Not yet implemented")
        val timess = times[position]
        holder.bind(timess)
    }

}