"# Codeigniter3_Simple-Dashboard-Datatables" 

Seeder : 

INSERT INTO equipment (name, category, specs, image, manual, stock, location)
VALUES
-- 1
('Omron Photoelectric Sensor E3Z-D62', 'Sensor', 
 'Sensing distance 2m; NPN output; 12-24VDC; Diffuse mode',
 'e3z_d62.jpg', 'e3z_manual.pdf', 25, 'Warehouse A'),

-- 2
('Siemens PLC S7-1200 CPU 1212C', 'PLC',
 'Digital I/O: 8DI/6DO; 2AI; PROFINET; 24VDC',
 's7_1200.jpg', 's7_1200_manual.pdf', 8, 'Rack 2 – Control Room'),

-- 3
('Mitsubishi Servo Motor HF-KP23B', 'Servo Motor',
 '200W; 3000rpm; Absolute Encoder; 1.3Nm torque',
 'mitsubishi_servo.jpg', 'servo_manual.pdf', 12, 'Warehouse B'),

-- 4
('Keyence Laser Sensor LR-TB2000', 'Sensor',
 'Laser diffuse reflective; 2m range; IP67',
 'keyence_laser.jpg', 'keyence_laser_manual.pdf', 15, 'Lab Sensor Testing'),

-- 5
('Omron HMI NB7W-TW01B', 'HMI',
 '7-inch TFT LCD; Serial + Ethernet; 65K colors',
 'omron_hmi.jpg', 'omron_hmi_manual.pdf', 5, 'Showroom'),

-- 6
('Delta VFD-M Series VFD004M21A', 'Motor Driver',
 '0.4kW inverter; single-phase; 220VAC; RS-485',
 'delta_vfd.jpg', 'delta_vfd_manual.pdf', 10, 'Warehouse C'),

-- 7
('Festo Pneumatic Cylinder DSNU-25-100-P-A', 'Pneumatic',
 '25mm bore; 100mm stroke; ISO 6432',
 'festo_cylinder.jpg', 'festo_manual.pdf', 30, 'Warehouse Pneumatic'),

-- 8
('ABB Robot IRC5 Controller Module', 'Robot Part',
 'IRB 1600 compatible; MultiMove; Ethernet/IP',
 'abb_controller.jpg', 'abb_manual.pdf', 3, 'Robot Service Area'),

-- 9
('Panasonic Fiber Optic Sensor FX-301P', 'Sensor',
 'Digital fiber amplifier; NPN; Teach Button',
 'fx301.jpg', 'fx301_manual.pdf', 20, 'Lab Equipment'),

-- 10
('Omron Power Supply S8VK-G12024', 'Power Supply',
 '120W; 24VDC; 5A; Compact; Wide temperature range',
 's8vk.jpg', 's8vk_manual.pdf', 18, 'Electrical Storage');

