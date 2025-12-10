"# Codeigniter3_Simple-Dashboard-Datatables" 

Database:

'hostname' => 'localhost',
'username' => 'root',
'password' => '',
'database' => 'ci3',
'dbdriver' => 'mysqli',

Data Dummy : 

INSERT INTO equipment (name, category, specs, image, manual, stock, location)
VALUES

-- 11
('ABB IRB 120 Industrial Robot', 'Robot Arm',
 '6-axis; 3kg payload; 580mm reach; IRC5 controller',
 'abb_irb120.jpg', 'abb_irb120_manual.pdf', 4, 'Robot Lab A'),

-- 12
('KUKA KR6 R700 Sixx', 'Robot Arm',
 '6-axis; 6kg payload; 700mm reach; KR C4 compact',
 'kuka_kr6.jpg', 'kuka_kr6_manual.pdf', 2, 'Robot Storage'),

-- 13
('Yaskawa Motoman GP8', 'Robot Arm',
 '8kg payload; 727mm reach; high-speed handling',
 'motoman_gp8.jpg', 'motoman_gp8_manual.pdf', 3, 'Automation Room'),

-- 14
('FANUC LR Mate 200iD', 'Robot Arm',
 '6-axis mini robot; 7kg payload; IP67',
 'fanuc_200id.jpg', 'fanuc_200id_manual.pdf', 5, 'Robot Cell 1'),

-- 15
('Universal Robot UR5e', 'Collaborative Robot',
 '5kg payload; 850mm reach; force-torque sensor',
 'ur5e.jpg', 'ur5e_manual.pdf', 4, 'Cobots Area'),

-- 16
('Universal Robot UR10e', 'Collaborative Robot',
 '10kg payload; 1300mm reach; safety functions',
 'ur10e.jpg', 'ur10e_manual.pdf', 2, 'Cobots Area'),

-- 17
('Epson VT6L All-in-One Robot', 'Robot Arm',
 '6-axis; 6kg payload; integrated controller',
 'epson_vt6l.jpg', 'epson_vt6l_manual.pdf', 3, 'Robot Lab B'),

-- 18
('Denso Cobotta 6-Axis Robot', 'Collaborative Robot',
 '0.7kg payload; 342mm reach; compact size',
 'denso_cobotta.jpg', 'denso_cobotta_manual.pdf', 6, 'Educational Lab'),

-- 19
('Staubli TX2-60', 'Robot Arm',
 '4.5kg payload; SIL3 safety; ultra-fast',
 'staubli_tx2.jpg', 'staubli_tx2_manual.pdf', 2, 'Robot Testing Room'),

-- 20
('Kawasaki RS007N', 'Robot Arm',
 '7kg payload; 730mm reach; high-speed pick & place',
 'kawasaki_rs007n.jpg', 'kawasaki_rs007n_manual.pdf', 3, 'Industrial Robot Rack'),

-- 21
('Mitsubishi RV-4FR', 'Robot Arm',
 '4kg payload; 649mm reach; CR800 controller',
 'mitsubishi_rv4fr.jpg', 'mitsubishi_rv4fr_manual.pdf', 4, 'Warehouse Robotics'),

-- 22
('Nachi MZ07 Robot', 'Robot Arm',
 '7kg payload; 723mm reach; lightweight body',
 'nachi_mz07.jpg', 'nachi_mz07_manual.pdf', 3, 'Robot Area C'),

-- 23
('HIWIN RA605-710', 'Robot Arm',
 '6kg payload; 710mm reach; precision machining',
 'hiwin_ra605.jpg', 'hiwin_ra605_manual.pdf', 5, 'Robot Storage 2'),

-- 24
('Techman TM5-700', 'Collaborative Robot',
 '4–6kg payload; vision integrated; 700mm reach',
 'tm5_700.jpg', 'tm5_700_manual.pdf', 2, 'Automation Lab'),

-- 25
('Omron TM12 Cobot', 'Collaborative Robot',
 '12kg payload; 1300mm reach; vision system',
 'omron_tm12.jpg', 'omron_tm12_manual.pdf', 2, 'Assembly Line Test'),

-- 26
('Delta DRV90L Industrial Robot', 'Robot Arm',
 '6-axis; 5kg payload; 900mm reach; EtherCAT',
 'delta_drv90l.jpg', 'delta_drv90l_manual.pdf', 4, 'Warehouse Delta'),

-- 27
('ABB IRB 1600', 'Robot Arm',
 '6kg payload; 1450mm reach; high-precision handling',
 'abb_irb1600.jpg', 'abb_irb1600_manual.pdf', 2, 'Robot Assembly Lab'),

-- 28
('KUKA LBR iiwa 7 R800', 'Collaborative Robot',
 '7kg payload; 800mm reach; torque sensors on all joints',
 'kuka_iiwa.jpg', 'kuka_iiwa_manual.pdf', 1, 'Research Lab'),

-- 29
('FANUC M-20iA', 'Robot Arm',
 '20kg payload; 1813mm reach; general automation',
 'fanuc_m20ia.jpg', 'fanuc_m20ia_manual.pdf', 3, 'Robot Lab C'),

-- 30
('Yaskawa Motoman HC10', 'Collaborative Robot',
 '10kg payload; 1200mm reach; hand-guided teaching',
 'motoman_hc10.jpg', 'motoman_hc10_manual.pdf', 2, 'Cobot Area'),

-- 31
('ABB YuMi IRB 14000', 'Collaborative Robot',
 'Dual-arm; 0.5kg payload per arm; safe interaction',
 'abb_yumi.jpg', 'abb_yumi_manual.pdf', 1, 'Research Robotics'),

-- 32
('Epson C4 Compact Robot', 'Robot Arm',
 '4kg payload; 665mm reach; compact SCARA alternative',
 'epson_c4.jpg', 'epson_c4_manual.pdf', 4, 'Automation Section'),

-- 33
('Denso VS-087', 'Robot Arm',
 '7kg payload; 905mm reach; high accuracy',
 'denso_vs087.jpg', 'denso_vs087_manual.pdf', 3, 'Robot Storage Room'),

-- 34
('Kawasaki BX100N', 'Robot Arm',
 '100kg payload; welding & material handling',
 'kawasaki_bx100n.jpg', 'kawasaki_bx100n_manual.pdf', 1, 'Heavy Robotics Area'),

-- 35
('Staubli TX2-90XL', 'Robot Arm',
 '20kg payload; 1450mm reach; cleanroom capable',
 'staubli_tx2_90.jpg', 'staubli_tx2_90_manual.pdf', 1, 'Precision Robotics');
