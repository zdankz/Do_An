package com.example.dangkykham

import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import androidx.fragment.app.Fragment
import com.example.dangkykham.frag.booking
import com.example.dangkykham.frag.contact
import com.example.dangkykham.frag.home
import kotlinx.android.synthetic.main.activity_all.*

class all : AppCompatActivity() {
    val home_frag = home()
    val booking_frag = booking()
    val contact_frag = contact()
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_all)
        makeCurrentFragment(home_frag)
        bottom_nvt.setOnNavigationItemSelectedListener {
            when(it.itemId){
                R.id.ic_homee -> makeCurrentFragment(home_frag)
                R.id.ic_contactt -> makeCurrentFragment(contact_frag)
                R.id.ic_booking -> makeCurrentFragment(booking_frag)
            }
            true
        }
    }
    private fun makeCurrentFragment(fragment: Fragment)=
        supportFragmentManager.beginTransaction().apply {
            replace(R.id.fl_wrapper,fragment)
            commit()
        }

}