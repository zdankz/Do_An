package com.example.khoa_luan_tot_nghiep.View.Link

import android.content.Intent
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import com.example.khoa_luan_tot_nghiep.MainActivity
import com.example.khoa_luan_tot_nghiep.R
import kotlinx.android.synthetic.main.activity_list__question.*
import kotlinx.android.synthetic.main.activity_reply.*
import kotlinx.android.synthetic.main.activity_tu_thuoc.*

class tu_thuoc : AppCompatActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_tu_thuoc)
        back_tu_thuoc.setOnClickListener {
            val i = Intent(this, MainActivity::class.java)
            startActivity(i)
            finish()
        }
    }
}