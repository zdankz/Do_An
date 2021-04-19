package com.example.khoa_luan_tot_nghiep.View.VanDe

import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.widget.ImageView
import com.bumptech.glide.Glide
import com.bumptech.glide.request.RequestOptions
import com.example.khoa_luan_tot_nghiep.R
import kotlinx.android.synthetic.main.activity_detail__vande2.*

class Detail_Vande : AppCompatActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_detail__vande2)
        val avata : ImageView = findViewById(R.id.avata_vande_detail)
        val i = intent
        val iddv = i.getStringExtra("iddv")
        ten_vande_detail.text = i.getStringExtra("tenvd")
        mota_vande_detail.text = i.getStringExtra("mota")
        chi_phi_vande_detail.text = i.getStringExtra("chiphi")
        time_vande_detail.text = i.getStringExtra("time")
        Glide.with(this)
            .load(i.getStringExtra("hinhanh")).placeholder(R.drawable.ic_load_avata_24).
            error(R.drawable.ic_load_avata_24).apply(RequestOptions.circleCropTransform()).override(100,100).into(avata)
    }
}