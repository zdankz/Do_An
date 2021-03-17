package com.example.dangkykham.frag

import android.content.Intent
import android.os.Bundle
import androidx.fragment.app.Fragment
import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import com.example.dangkykham.MainActivity
import com.example.dangkykham.R
import kotlinx.android.synthetic.main.fragment_booking.*


class booking : Fragment() {
    // TODO: Rename and change types of parameters

    override fun onCreateView(
            inflater: LayoutInflater, container: ViewGroup?,
            savedInstanceState: Bundle?
    ): View? {
        // Inflate the layout for this fragment
        return inflater.inflate(R.layout.fragment_booking, container, false)
    }
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)

    }
    override fun onActivityCreated(savedInstanceState: Bundle?) {
        super.onActivityCreated(savedInstanceState)
        thammy.setOnClickListener {
            var URL : String = "1"
            var o = Intent(frag_book.context,MainActivity::class.java)
            o.putExtra("nhucau",URL)
            startActivity(o)
        }

        benhly.setOnClickListener{
            var URL : String = "2"
            var o = Intent(frag_book.context,MainActivity::class.java)
            o.putExtra("nhucau",URL)
            startActivity(o)
        }
//        tssss.setOnClickListener {
//            var o = Intent(frag_book.context,MainActivity::class.java)
//            startActivity(o)
//        }

    }




}