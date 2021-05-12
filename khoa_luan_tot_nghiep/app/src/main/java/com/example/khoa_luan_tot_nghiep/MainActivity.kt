package com.example.khoa_luan_tot_nghiep

import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import androidx.fragment.app.Fragment
import com.example.khoa_luan_tot_nghiep.Frag.Book
import com.example.khoa_luan_tot_nghiep.Frag.Contact
import com.example.khoa_luan_tot_nghiep.Frag.Home
import kotlinx.android.synthetic.main.activity_main.*
import kotlinx.android.synthetic.main.fragment_book.*

class MainActivity : AppCompatActivity() {
    val book = Book()
    val home = Home()
    val con = Contact()
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_main)

        makeCurrentFragment(home)
        bottom_nvt.setOnNavigationItemSelectedListener {
            when(it.itemId){
                R.id.ic_book -> makeCurrentFragment(book)
                R.id.ic_homee -> makeCurrentFragment(home)
                R.id.ic_contact -> makeCurrentFragment(con)

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