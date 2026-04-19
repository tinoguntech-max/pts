package com.smkn1kras.kioskpts;

import android.app.Activity;
import android.app.ActivityManager;
import android.app.AlertDialog;
import android.app.admin.DevicePolicyManager;
import android.content.ComponentName;
import android.content.Context;
import android.content.Intent;
import android.content.pm.ActivityInfo;
import android.os.Bundle;
import android.view.KeyEvent;
import android.view.View;
import android.view.WindowManager;
import android.webkit.WebResourceRequest;
import android.webkit.WebView;
import android.webkit.WebViewClient;
import android.widget.Button;

public class MainActivity extends Activity {

    private static final String URL = "http://psaj.smkn1kras.com";
    private WebView webView;
    private DevicePolicyManager dpm;
    private ComponentName adminComponent;
    private boolean isExiting = false;
    private int volumeCount = 0;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);

        getWindow().addFlags(
            WindowManager.LayoutParams.FLAG_KEEP_SCREEN_ON |
            WindowManager.LayoutParams.FLAG_FULLSCREEN |
            WindowManager.LayoutParams.FLAG_DISMISS_KEYGUARD |
            WindowManager.LayoutParams.FLAG_SHOW_WHEN_LOCKED
        );

        hideSystemUI();
        setContentView(R.layout.activity_main);

        dpm = (DevicePolicyManager) getSystemService(Context.DEVICE_POLICY_SERVICE);
        adminComponent = new ComponentName(this, KioskDeviceAdminReceiver.class);

        webView = findViewById(R.id.webview);
        webView.getSettings().setJavaScriptEnabled(true);
        webView.getSettings().setDomStorageEnabled(true);
        webView.getSettings().setLoadWithOverviewMode(true);
        webView.getSettings().setUseWideViewPort(true);
        webView.getSettings().setAllowFileAccess(true);
        webView.getSettings().setAllowContentAccess(true);
        webView.getSettings().setSupportMultipleWindows(false);
        webView.getSettings().setMixedContentMode(android.webkit.WebSettings.MIXED_CONTENT_ALWAYS_ALLOW);

        webView.setWebViewClient(new WebViewClient() {
            @Override
            public boolean shouldOverrideUrlLoading(WebView view, WebResourceRequest request) {
                view.loadUrl(request.getUrl().toString());
                return true;
            }

            @Override
            public void onReceivedError(WebView view, int errorCode, String description, String failingUrl) {
                view.loadUrl(URL);
            }
        });

        webView.loadUrl(URL);

        Button btnRotate = findViewById(R.id.btn_rotate);
        btnRotate.setOnClickListener(v -> {
            int current = getRequestedOrientation();
            if (current == ActivityInfo.SCREEN_ORIENTATION_LANDSCAPE) {
                setRequestedOrientation(ActivityInfo.SCREEN_ORIENTATION_PORTRAIT);
            } else {
                setRequestedOrientation(ActivityInfo.SCREEN_ORIENTATION_LANDSCAPE);
            }
        });

        Button btnExit = findViewById(R.id.btn_exit);
        btnExit.setOnClickListener(v -> showExitDialog());

        startLockTaskIfAllowed();
    }

    private void showExitDialog() {
        AlertDialog dialog = new AlertDialog.Builder(this)
            .setTitle("Keluar Aplikasi")
            .setMessage("Tunggu 120 detik...")
            .setNegativeButton("Batal", null)
            .setPositiveButton("Keluar", null)
            .create();

        dialog.show();

        Button btnConfirm = dialog.getButton(AlertDialog.BUTTON_POSITIVE);
        btnConfirm.setEnabled(false);

        new android.os.CountDownTimer(120000, 1000) {
            public void onTick(long millisUntilFinished) {
                long secs = millisUntilFinished / 1000;
                dialog.setMessage("Tunggu " + secs + " detik...");
            }
            public void onFinish() {
                dialog.setMessage("Siap keluar");
                btnConfirm.setText("Keluar");
                btnConfirm.setEnabled(true);
                btnConfirm.setOnClickListener(v -> {
                    dialog.dismiss();
                    exitKiosk();
                });
            }
        }.start();
    }

    private void exitKiosk() {
        isExiting = true;
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
    }

    private void startLockTaskIfAllowed() {
        if (dpm.isDeviceOwnerApp(getPackageName())) {
            dpm.setLockTaskPackages(adminComponent, new String[]{getPackageName()});
            startLockTask();
        } else {
            ActivityManager am = (ActivityManager) getSystemService(Context.ACTIVITY_SERVICE);
            if (am.getLockTaskModeState() == ActivityManager.LOCK_TASK_MODE_NONE) {
                startLockTask();
            }
        }
    }

    private void hideSystemUI() {
        getWindow().getDecorView().setSystemUiVisibility(
            View.SYSTEM_UI_FLAG_LAYOUT_STABLE |
            View.SYSTEM_UI_FLAG_LAYOUT_HIDE_NAVIGATION |
            View.SYSTEM_UI_FLAG_LAYOUT_FULLSCREEN |
            View.SYSTEM_UI_FLAG_HIDE_NAVIGATION |
            View.SYSTEM_UI_FLAG_FULLSCREEN |
            View.SYSTEM_UI_FLAG_IMMERSIVE_STICKY
        );
    }

    @Override
    public boolean dispatchKeyEvent(KeyEvent event) {
        if (event.getKeyCode() == KeyEvent.KEYCODE_VOLUME_DOWN &&
                event.getAction() == KeyEvent.ACTION_DOWN) {
            volumeCount++;
            if (volumeCount >= 3) {
                volumeCount = 0;
                showExitDialog();
            }
            return true;
        }
        return super.dispatchKeyEvent(event);
    }

    @Override
    protected void onResume() {
        super.onResume();
        hideSystemUI();
        startLockTaskIfAllowed();
    }

    @Override
    protected void onStop() {
        super.onStop();
        if (isExiting) return;
        Intent intent = new Intent(this, MainActivity.class);
        intent.addFlags(Intent.FLAG_ACTIVITY_NEW_TASK | Intent.FLAG_ACTIVITY_REORDER_TO_FRONT);
        startActivity(intent);
    }

    @Override
    public void onBackPressed() {}

    @Override
    public boolean onKeyDown(int keyCode, KeyEvent event) {
        if (keyCode == KeyEvent.KEYCODE_BACK) {
            if (webView.canGoBack()) webView.goBack();
            return true;
        }
        return super.onKeyDown(keyCode, event);
    }
}
