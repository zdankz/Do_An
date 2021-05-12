package com.example.khoa_luan_tot_nghiep.Frag

import android.content.Intent
import android.os.Bundle
import androidx.fragment.app.Fragment
import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import com.example.khoa_luan_tot_nghiep.Entity.VanDe.Vande_Home
import com.example.khoa_luan_tot_nghiep.R
import com.example.khoa_luan_tot_nghiep.View.Link.List_Question
import com.example.khoa_luan_tot_nghiep.View.NhaSi.NhaSi_Home
import com.example.khoa_luan_tot_nghiep.View.VanDe.VanDe_Home
import kotlinx.android.synthetic.main.fragment_home.*


class Home : Fragment() {


    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)

    }

    override fun onCreateView(inflater: LayoutInflater, container: ViewGroup?,
                              savedInstanceState: Bundle?): View? {
        // Inflate the layout for this fragment
        return inflater.inflate(R.layout.fragment_home, container, false)
    }

    override fun onActivityCreated(savedInstanceState: Bundle?) {
        super.onActivityCreated(savedInstanceState)
        event_nhasi_home.setOnClickListener {
            val i = Intent(this.context,NhaSi_Home::class.java)
            startActivity(i)
        }
        danh_sach_dich_vu_.setOnClickListener {
            val inn = Intent(this.context,VanDe_Home::class.java)
            startActivity(inn)

        }
        cauhoi.setOnClickListener {
            val inn = Intent(this.context,List_Question::class.java)
            startActivity(inn)
        }
        tu_thuoc.setOnClickListener {
            val inn = Intent(this.context,com.example.khoa_luan_tot_nghiep.View.Link.tu_thuoc::class.java)
            startActivity(inn)
        }
    }

  
}