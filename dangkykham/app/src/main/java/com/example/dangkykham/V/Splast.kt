package com.example.dangkykham.V

import android.content.Intent
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import com.example.dangkykham.MainActivity
import com.example.dangkykham.R
import com.example.dangkykham.all
import kotlinx.android.synthetic.main.activity_splast.*

class Splast : AppCompatActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_splast)
        iv_note.alpha= 0f
        iv_note.animate().setDuration(3000).alpha(1f).withEndAction{
            val i = Intent(this, all::class.java)
            startActivity(i)
            overridePendingTransition(android.R.anim.fade_in,android.R.anim.fade_out)
            finish()

        }
    }
}