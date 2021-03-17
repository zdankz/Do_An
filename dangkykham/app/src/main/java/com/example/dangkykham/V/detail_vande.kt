package com.example.dangkykham.V

import android.content.Intent
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import com.bumptech.glide.Glide
import com.example.dangkykham.MainActivity
import com.example.dangkykham.R
import kotlinx.android.synthetic.main.activity_detail_vande.*

class detail_vande : AppCompatActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_detail_vande)
        val i = intent
        var ten : String? =  i.getStringExtra("name")
        var mt : String? = i.getStringExtra("mota")
        var anh :String? = i.getStringExtra("anh")
        gettenvande.text = ten.toString()
        getmota.text = mt.toString()
        Glide.with(this).load(anh).into(igm_load)
        book.setOnClickListener {
            val i = Intent(this,register::class.java)
            i.putExtra("tenbenh",ten)
            startActivity(i)

        }
//        getItem()

    }
    private fun getItem( ){
        val i = intent
        var ten : String? =  i.getStringExtra("name")
        var mt : String? = i.getStringExtra("mota")

        gettenvande.text = ten.toString()
        getmota.text = mt.toString()
    }
}