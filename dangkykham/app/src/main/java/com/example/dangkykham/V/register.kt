package com.example.dangkykham.V

import android.content.Intent
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.widget.Toast
import androidx.core.view.get
import com.example.dangkykham.R
import kotlinx.android.synthetic.main.activity_detail_vande.*
import kotlinx.android.synthetic.main.activity_register.*

class register : AppCompatActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_register)
        val i = intent
        val a : String? = i.getStringExtra("tenbenh")
        loadvadetubooking.setText(a)


        book_now.setOnClickListener {
            if(1 == 1)
            {
                val i = Intent(this,TY::class.java)
                startActivity(i)
            }

        }

    }


}