package com.example.dangkykham.V

import android.content.Intent
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import com.example.dangkykham.R
import com.example.dangkykham.all
import kotlinx.android.synthetic.main.activity_t_y.*

class TY : AppCompatActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_t_y)
        comehome.setOnClickListener {
            var i = Intent(this,all::class.java)
            startActivity(i)
        }
    }
}