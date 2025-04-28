#!/bin/bash

INSTANCE_ID="i-0c1a09c9025af84fc" 

AMI_NAME="RecipeHub-Updated-$(date +'%Y-%m-%d')"

echo "Creating a new AMI from instance: $INSTANCE_ID"
NEW_AMI_ID=$(aws ec2 create-image --instance-id $INSTANCE_ID --name "$AMI_NAME" --no-reboot --output text)

echo "New AMI ID: $NEW_AMI_ID"

echo "Waiting for the AMI to become available..."
aws ec2 wait image-available --image-ids $NEW_AMI_ID

echo "AMI $NEW_AMI_ID is now available."

OLD_AMI_ID=$(aws ec2 describe-instances --instance-id $INSTANCE_ID --query "Reservations[0].Instances[0].ImageId" --output text)

echo "Updating CloudFormation template with new AMI ID: $NEW_AMI_ID"
sed -i "s/ami-0123456789abcdef0/$NEW_AMI_ID/" template.yaml  

echo "Deleting the old AMI: $OLD_AMI_ID"
aws ec2 deregister-image --image-id $OLD_AMI_ID

echo "AMI creation and CloudFormation update complete."
