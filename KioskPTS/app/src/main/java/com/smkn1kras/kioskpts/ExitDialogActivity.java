package com.smkn1kras.kioskpts;

import android.app.Activity;
import android.app.ActivityManager;
import android.content.Context;
import android.os.Bundle;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

public class ExitDialogActivity extends Activity {

    private static final String EXIT_PIN = "123456";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_exit);

        EditText pinInput = findViewById(R.id.pin_input);
        Button btnConfirm = findViewById(R.id.btn_confirm);
        Button btnCancel = findViewById(R.id.btn_cancel);

        btnConfirm.setOnClickListener(v -> {
            String pin = pinInput.getText().toString();
            if (pin.equals(EXIT_PIN)) {
                // Stop screen pinning dulu
                try {
                    ActivityManager am = (ActivityManager) getSystemService(Context.ACTIVITY_SERVICE);
                    if (am.getLockTaskModeState() != ActivityManager.LOCK_TASK_MODE_NONE) {
                        stopLockTask();
                    }
                } catch (Exception e) {
                    e.printStackTrace();
                }
                finishAffinity();
                System.exit(0);
            } else {
                Toast.makeText(this, "PIN salah!", Toast.LENGTH_SHORT).show();
                pinInput.setText("");
            }
        });

        btnCancel.setOnClickListener(v -> finish());
    }

    @Override
    public void onBackPressed() {
        // Blokir back
    }
}
