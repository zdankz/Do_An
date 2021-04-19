package com.example.khoa_luan_tot_nghiep.View.NhaSi

import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.widget.ImageView
import com.bumptech.glide.Glide
import com.bumptech.glide.request.RequestOptions
import com.example.khoa_luan_tot_nghiep.R
import kotlinx.android.synthetic.main.activity_detail__nha_si.*
import kotlinx.android.synthetic.main.activity_detail__nha_si__vande.*

class Detail_NhaSi_Vande : AppCompatActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_detail__nha_si__vande)
        val avata : ImageView = findViewById(R.id.avata_nhasi_vande_detail)
        val inn = intent
        ten_nhasi_vande_detail.text = inn.getStringExtra("tendv")
        time_nha_si_vande_detail.text = inn.getStringExtra("time")
        val id_dv = inn.getStringExtra("iddv");
        mota_nha_si_vande_detail.text = inn.getStringExtra("motadv")
        chi_phi_nha_si_vande_detail.text = "${inn.getStringExtra("chiphi")} VND"
        Glide.with(this)
            .load(inn.getStringExtra("hinhanh")).placeholder(R.drawable.ic_load_avata_24).
            error(R.drawable.ic_load_avata_24).apply(RequestOptions.circleCropTransform()).
            override(170,170).into(avata)

    }
}