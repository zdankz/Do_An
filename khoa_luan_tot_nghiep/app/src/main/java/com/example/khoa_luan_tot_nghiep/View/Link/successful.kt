package com.example.khoa_luan_tot_nghiep.View.Link

import android.content.Intent
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import com.example.khoa_luan_tot_nghiep.MainActivity
import com.example.khoa_luan_tot_nghiep.R
import kotlinx.android.synthetic.main.activity_successful.*

class successful : AppCompatActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_successful)
        come_home.setOnClickListener {
            val intent= Intent(this,MainActivity::class.java)
            startActivity(intent)
            finish()
        }

    }
}