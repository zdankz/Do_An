package com.example.khoa_luan_tot_nghiep.Holder.Toge

import android.content.Intent
import android.view.View
import android.widget.RelativeLayout
import android.widget.TextView
import androidx.recyclerview.widget.RecyclerView
import com.example.khoa_luan_tot_nghiep.Entity.Toge.ngay_lam_viec
import com.example.khoa_luan_tot_nghiep.Entity.Toge.time
import com.example.khoa_luan_tot_nghiep.R
import com.example.khoa_luan_tot_nghiep.View.Toge.Register
import com.example.khoa_luan_tot_nghiep.View.Toge.show_lich

class time_holder (v: View): RecyclerView.ViewHolder(v) {

   private  val ngay : TextView = v.findViewById(R.id.ngay_dang_ky)
    private val bd : TextView = v.findViewById(R.id.time_bd)
    private  val kt : TextView = v.findViewById(R.id.time_end)
    private val Ron2 :RelativeLayout = v.findViewById(R.id.rlRoot_time)

    fun bind(time: time) {
        ngay.text = time.ngay
        bd.text = time.thoigianbatdau
        kt.text = time.thoigiankt

        clickEvent(time)
    }

    private fun clickEvent(time: time) {
        Ron2.setOnClickListener {

            if(time.thoigiankt.equals("FULL")){
                val inn = Intent(Ron2.context,show_lich::class.java)
                inn.putExtra("id_ns",time.idns)
                inn.putExtra("id_dv",time.iddv)
                Ron2.context.startActivity(inn)
            }else {
                val i = Intent(Ron2.context,Register::class.java)
                i.putExtra("id_ns",time.idns)
                i.putExtra("id_dv",time.iddv)
                i.putExtra("ngay",time.ngay)
                i.putExtra("chiphi",time.chiphi)
                i.putExtra("bd",time.thoigianbatdau)
                i.putExtra("kt",time.thoigiankt)
                i.putExtra("ten",time.hoten)
                i.putExtra("tendv",time.tendv)

                Ron2.context.startActivity(i)
            }
        }
        }
}
