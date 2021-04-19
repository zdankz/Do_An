package com.example.khoa_luan_tot_nghiep.View.Link

import android.content.Intent
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import com.example.khoa_luan_tot_nghiep.MainActivity
import com.example.khoa_luan_tot_nghiep.R
import kotlinx.android.synthetic.main.activity_list__question.*
import kotlinx.android.synthetic.main.activity_reply.*

class List_Question : AppCompatActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_list__question)
        qs1.setOnClickListener {
            val i = Intent(this,Reply::class.java)
            i.putExtra("ch",qs_t1.text.toString())
            i.putExtra("id","1")
            startActivity(i)
            finish()
        }
        qs12.setOnClickListener {
            val i = Intent(this,Reply::class.java)
            i.putExtra("ch",qs_t12.text.toString())
            i.putExtra("id","12")
            startActivity(i)
            finish()
        }
        qs2.setOnClickListener {
            val i = Intent(this,Reply::class.java)
            i.putExtra("ch",qs_t2.text.toString())
            i.putExtra("id","2")
            startActivity(i)
            finish()
        }
        qs3.setOnClickListener {
            val i = Intent(this,Reply::class.java)
            i.putExtra("ch",qs_t3.text.toString())
            i.putExtra("id","3")
            startActivity(i)
            finish()
        }
        qs4.setOnClickListener {
            val i = Intent(this,Reply::class.java)
            i.putExtra("ch",qs_t4.text.toString())
            i.putExtra("id","4")
            startActivity(i)
            finish()
        }
        qs5.setOnClickListener {
            val i = Intent(this,Reply::class.java)
            i.putExtra("ch",qs_t5.text.toString())
            i.putExtra("id","5")
            startActivity(i)
            finish()
        }
        qs6.setOnClickListener {
            val i = Intent(this,Reply::class.java)
            i.putExtra("ch",qs_t6.text.toString())
            i.putExtra("id","6")
            startActivity(i)
            finish()
        }
        qs7.setOnClickListener {
            val i = Intent(this,Reply::class.java)
            i.putExtra("ch",qs_t7.text.toString())
            i.putExtra("id","7")
            startActivity(i)
            finish()
        }
        qs8.setOnClickListener {
            val i = Intent(this,Reply::class.java)
            i.putExtra("ch",qs_t8.text.toString())
            i.putExtra("id","8")
            startActivity(i)
            finish()
        }
        qs9.setOnClickListener {
            val i = Intent(this,Reply::class.java)
            i.putExtra("ch",qs_t9.text.toString())
            i.putExtra("id","9")
            startActivity(i)
            finish()
        }
        qs10.setOnClickListener {
            val i = Intent(this,Reply::class.java)
            i.putExtra("ch",qs_t10.text.toString())
            i.putExtra("id","10")
            startActivity(i)
            finish()
        }
        qs11.setOnClickListener {
            val i = Intent(this,Reply::class.java)
            i.putExtra("ch",qs_t11.text.toString())
            i.putExtra("id","11")
            startActivity(i)
            finish()
        }
        back_listqest.setOnClickListener {
            val i = Intent(this, MainActivity::class.java)
            startActivity(i)
            finish()
        }

    }
}