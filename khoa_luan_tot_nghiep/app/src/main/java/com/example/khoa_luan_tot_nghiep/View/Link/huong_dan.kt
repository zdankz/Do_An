package com.example.khoa_luan_tot_nghiep.View.Link

import android.content.Intent
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import com.example.khoa_luan_tot_nghiep.MainActivity
import com.example.khoa_luan_tot_nghiep.R
import kotlinx.android.synthetic.main.activity_huong_dan.*
import kotlinx.android.synthetic.main.activity_list__question.*

class huong_dan : AppCompatActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_huong_dan)
        back_huong_dan.setOnClickListener {
            val i = Intent(this, MainActivity::class.java)
            startActivity(i)
            finish()
        }
    }
}