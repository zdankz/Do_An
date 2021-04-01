package com.example.khoa_luan_tot_nghiep

import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import androidx.fragment.app.Fragment
import com.example.khoa_luan_tot_nghiep.Frag.Book
import kotlinx.android.synthetic.main.activity_main.*
import kotlinx.android.synthetic.main.fragment_book.*

class MainActivity : AppCompatActivity() {
    val book = Book()
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_main)

        makeCurrentFragment(book)
        bottom_nvt.setOnNavigationItemSelectedListener {
            when(it.itemId){
                R.id.ic_book -> makeCurrentFragment(book)
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