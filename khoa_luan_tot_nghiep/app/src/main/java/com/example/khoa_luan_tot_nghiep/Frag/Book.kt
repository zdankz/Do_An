package com.example.khoa_luan_tot_nghiep.Frag

import android.content.Intent
import android.os.Bundle
import androidx.fragment.app.Fragment
import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import com.example.khoa_luan_tot_nghiep.R
import com.example.khoa_luan_tot_nghiep.View.NhaSi.Show_Nha_Si
import com.example.khoa_luan_tot_nghiep.View.VanDe.Show_Van_de
import kotlinx.android.synthetic.main.fragment_book.*


class Book : Fragment() {


    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)

    }

    override fun onCreateView(inflater: LayoutInflater, container: ViewGroup?,
                              savedInstanceState: Bundle?): View? {        // Inflate the layout for this fragment
        return inflater.inflate(R.layout.fragment_book, container, false)
    }

    override fun onActivityCreated(savedInstanceState: Bundle?) {
        super.onActivityCreated(savedInstanceState)
        theo_nha_si.setOnClickListener {
            val i = Intent(this.context,Show_Nha_Si::class.java)
            startActivity(i)
        }
        theo_van_de.setOnClickListener {
            val i = Intent(this.context,Show_Van_de::class.java)
            startActivity(i)
        }

    }


}