package com.example.khoa_luan_tot_nghiep.View.Link

import android.content.Context
import android.content.Intent
import android.net.ConnectivityManager
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.os.Handler
import android.widget.Toast
import androidx.lifecycle.Observer
import com.example.khoa_luan_tot_nghiep.MainActivity
import com.example.khoa_luan_tot_nghiep.Network.NetwordConnection
import com.example.khoa_luan_tot_nghiep.R
import kotlinx.android.synthetic.main.activity_s_f_l.*
import java.util.*
import kotlin.concurrent.schedule

class SFL : AppCompatActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_s_f_l)
        iv_note.alpha = 0f
        iv_note.animate().setDuration(3000).alpha(1f).withEndAction {

            overridePendingTransition(android.R.anim.fade_in, android.R.anim.fade_out)
        }
            val cmm = baseContext.getSystemService(Context.CONNECTIVITY_SERVICE) as ConnectivityManager
            val networkInto = cmm.activeNetworkInfo

            if (networkInto != null && networkInto.isConnected) {
                if (networkInto.type == ConnectivityManager.TYPE_WIFI) {
                    Toast.makeText(this, "co ket noi INTERNET", Toast.LENGTH_LONG).show()
                    val i = Intent(this, MainActivity::class.java)
                    startActivity(i)

                } else if (networkInto.type == ConnectivityManager.TYPE_MOBILE) {
                    Toast.makeText(this, "co ket noi INTERNET", Toast.LENGTH_LONG).show()
                    val i = Intent(this, MainActivity::class.java)
                    startActivity(i)
                }

            } else {
                Toast.makeText(this, "k co ket noi INTERNET", Toast.LENGTH_LONG).show()
                val handler = Handler()
                handler.postDelayed({ finish() }, 3000)


            }
        }
    }
